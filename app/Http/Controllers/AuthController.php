<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    public function signup(AuthRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($request['password']);
        $user = User::create($data);
        return (new AuthResource($user))
        ->additional(['mensaje' => 'Usuario registrado']);
         
    }

    public function signin(LoginRequest $request)
    {
        //
        $data = $request->all();
        // Check email
        $user = User::where('email', $data['email'])->first();
        $match = Hash::check($data['password'], $user->password);
        if(! $user || ! $match){
            throw ValidationException::withMessages([
                'mensaje' => ['Las credenciales son incorrectas.']
            ]);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return (new AuthResource($user))
        ->additional(['token' => $token,
                        'mensaje' => 'Inicio de sesion exitoso']);
    }

    public function logout()
    {
        //
        request()->user()->currentAccessToken()->delete();
        return response()->json("Sesion cerrada exitosamente");
    }
}
