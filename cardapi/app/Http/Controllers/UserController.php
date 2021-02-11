<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
    $credentials = $request->only('email', 'password');
    try {
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 400);
            Log::info('Creedenciales invalidas');
        }
    } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
        Log::info('No se ha podido crear el token');
    }
    Log::info('usuario creado');
    return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
    try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
                Log::info('Usuario no encontrado');
        }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getStatusCode());
                Log::info('Token expirado');
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid'], $e->getStatusCode());
                Log::info('Token invalido');
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getStatusCode());
                Log::info('No hay token');
        }
        return response()->json(compact('user'));
    }


    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'string',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);


        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function logout(Request $request){
    	JWTAuth::invalidate($request->get('authorization'));
        Log::info('logout');

    	return response()->json([
    		'status'=> 'success',
    		'message'=>'logout'
    	],200);
    }
}
