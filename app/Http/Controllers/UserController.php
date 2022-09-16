<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private function intentoLogin(UserRequest $request)
    {
        $credentials = request(['correo_est', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Error, credenciales incorrectas'
            ], 401);
        }
        return $request->user();
    }

    public function prevLogin(UserRequest $request)
    {
        $user = $this->intentoLogin($request);
        return response()->json([
            'roles' => $user->tipoUsuarios
        ], 200);
    }
    public function login(UserRequest $request)
    {
        $rolLogin = $request->rol;
        $user = $this->intentoLogin($request);
        $hayRol = false;
        foreach($user->tipoUsuarios as $u) {
            $hayRol = ($u->id == $rolLogin) ? true : false;   
        }
        if (!$hayRol) {
            return response()->json([
                'error_code' => 'NO_EXISTING_ROLE',
                'mensaje'   => 'El usuario no tiene asignado el rol que seleccionó'
            ], 400);
        } else {
            $tokenResult = $user->createToken('Personal Access Token');

            $token = $tokenResult->token;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
            }

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
                'selected_role' => $rolLogin
            ], 200);
        }
    }

    public function aceptarPoliticas(Request $request)
    {
        $user = $this->user($request);
        if ($user) {
            dd($user);
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'mensaje' => 'Sesión terminada con exito'
        ], 200);
    }
}
