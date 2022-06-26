<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function signup(AuthRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($request['password']);
        $user = User::create($data);
        $token = $user->createToken('myapptoken')->plainTextToken;
        return (new AuthResource($user))
        ->additional(['token' => $token,
                        'mensaje' => 'Usuario registrado']);
         
    }

    public function signin(LoginRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($request['password']);
        // Check email
        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password)){
        //    return response()->json(["mensaje" => "Credenciales invalidas"]);
        //}
        $token = $user->createToken('myapptoken')->plainTextToken;
        return (new AuthResource($user))
        ->additional(['token' => $token,
                        'mensaje' => 'Inicio de sesion exitoso']);
        }
    }

    public function logout()
    {
        //
        request()->user()->currentAccessToken()->delete();
        return response()->json("Sesion cerrada exitosamente");
    }
}
