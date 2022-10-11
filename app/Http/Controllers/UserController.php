<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use stdClass;

class UserController extends Controller
{
    private function intentoLogin(UserRequest $request)
    {
        $success = false;
        $data = new stdClass;
        $credentials = request(['correo_est', 'password']);
        if (Auth::attempt($credentials)) {
            $success = true;
            $data = $request->user();
        }
        return array(
            'success' => $success,
            'data' => $data
        );
    }

    private function retornoCredencialesIncorrectas()
    {
        return response()->json([
            'error_code' => 'INVALID_CREDENTIALS',
            'mensaje'   => 'Error, usuario o contraseña incorrectas.'
        ], 401);
    }

    public function prevLogin(UserRequest $request)
    {
        $user = $this->intentoLogin($request);
        if ($user['success'])
            return response()->json([
                'roles' => $user['data']->tipoUsuarios
            ], 200);
        else return $this->retornoCredencialesIncorrectas();
    }
    public function login(UserRequest $request)
    {
        $rolLogin = $request->rol;
        $user = $this->intentoLogin($request);
        if ($user['success']) {
            $hayRol = false;
            foreach ($user['data']->tipoUsuarios as $u) {
                $hayRol = ($u->id == $rolLogin) ? true : false;
            }
            if (!$hayRol) {
                return response()->json([
                    'error_code' => 'NO_EXISTING_ROLE',
                    'mensaje'   => 'El usuario no tiene asignado el rol que seleccionó'
                ], 400);
            } else {
                $tokenResult = $user['data']->createToken('Personal Access Token');

                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                    $token->save();
                }

                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
                ], 200);
            }
        } else return $this->retornoCredencialesIncorrectas();
    }

    public function aceptarPoliticas($id)
    {
        try {
            $user = Usuario::findOrFail($id);
            if (!$user->acepta_politica) {
                $user->acepta_politica = true;
                $user->save();
                return response()->json([
                    'mensaje' => 'Politica de tratamiento de datos aceptada'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error_code' => 'NO_EXISTING_USER',
                'mensaje'   => 'El usuario que acepta la política de tratamiento de datos no existe en nuestro sistema.'
            ], 400);
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
