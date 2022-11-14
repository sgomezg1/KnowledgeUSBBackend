<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Support\Facades\Http;
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
            'success' => false,
            'error_code' => 'INVALID_CREDENTIALS',
            'mensaje'   => 'Error, usuario o contraseña incorrectas.'
        ], 401);
    }

    public function prevLogin(UserRequest $request)
    {
        $user = $this->intentoLogin($request);
        if ($user['success'])
            return response()->json([
                'success' => true,
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
                $hayRol = ($u->nombre === $rolLogin) ? true : false;
                if ($hayRol) break;
            }
            if (!$hayRol) {
                return response()->json([
                    'success' => false,
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
                    'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
                    'politicas' => $request->user()->acepta_politicas,
                    'success' => true
                ], 200);
            }
        } else return $this->retornoCredencialesIncorrectas();
    }

    public function aceptarPoliticas(Request $request)
    {
        try {
            $user = Usuario::where('correo_est', $request->email)->first();
            if ($user) {
                if (!$user->acepta_politicas) {
                    $user->acepta_politicas = true;
                    $user->save();
                    return response()->json([
                        'mensaje' => 'Politica de tratamiento de datos aceptada'
                    ]);
                }
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'error_code' => 'NO_EXISTING_USER',
                'mensaje'   => 'El usuario que acepta la política de tratamiento de datos no existe en nuestro sistema.'
            ], 400);
        }
    }

    protected function solicitarTokenJWTRefresco($correo, $password) {
        $client = \Laravel\Passport\Client::where('id', 2)->first();
        $tokenJWT = Http::asForm()->post('http://localhost:8000/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $correo,
            'password' => $password
        ]);
        return $tokenJWT->json();
    }

    public function refrescarTokenExpirado(Request $request) {
        $client = \Laravel\Passport\Client::where('id', 2)->first();
        $tokenJWT = Http::asForm()->post('http://localhost:8000/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->token,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => '',
        ]);
        return $tokenJWT->json();
    }

    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'mensaje' => 'Sesión terminada con exito'
        ], 200);
    }
}
