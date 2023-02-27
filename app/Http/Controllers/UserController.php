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
    public function getDatosUsuNavbar()
    {
        $authUser = auth()->guard('api')->user();
        $datosUsu = Usuario::select('nombres', 'apellidos')->where('cedula', $authUser->cedula)->first();
        $usuario = Usuario::with('tipoUsuarios')->where('cedula', $authUser->cedula)->first();
        $rolUsu = $usuario->tipoUsuarios()->first()->nombre;
        return response()->json(array(
            "datos" => $datosUsu,
            "rol" => $rolUsu
        ));
    }

    private function intentoLogin(UserRequest $request)
    {
        $success = false;
        $data = new stdClass;
        $rolUsu = '';
        $credentials = request(['correo_est', 'password']);
        if (Auth::attempt($credentials)) {
            $success = true;
            $data = $request->user();
            $rol = Usuario::with('tipoUsuarios')->where('cedula', $data->cedula)->first();
            $rolUsu = $rol->tipoUsuarios()->first()->nombre;
        }
        return array(
            'success' => $success,
            'data' => $data,
            'rol' => $rolUsu
        );
    }

    private function retornoCredencialesIncorrectas()
    {
        return response()->json([
            'success' => false,
            'error_code' => 'INVALID_CREDENTIALS',
            'mensaje'   => 'Error, usuario o contraseña incorrectas.'
        ], 200);
    }
    public function login(UserRequest $request)
    {
        $user = $this->intentoLogin($request);
        if ($user['success']) {
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
                'success' => true,
                'rol' => $user['rol']
            ], 200);
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
                        'success' => true,
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

    protected function solicitarTokenJWTRefresco($correo, $password)
    {
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

    public function refrescarTokenExpirado(Request $request)
    {
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
