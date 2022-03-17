<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|unique:users,email',
            'password'=>'required|string'
        ]);

        $user = User::create([
            'name' => $fields['email'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('usertoken')->plainTextToken;

        $response = [
            'user' =>$user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return ['message'=>"Logged out"];
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password'=>'required|string|min:8'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'],$user->password))
        {
            return response([
                'message'=>'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('usertoken')->plainTextToken;

        $response = [
            'user' =>$user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function refresh(Request $request)
    {
        if(auth()->user()->tokens()==null)
        {
            return response(['message'=>'Unauthenticated'],401);
        }
        else{
            auth()->user()->tokens()->delete();

            $token = $request->user()->createToken('usertoken')->plainTextToken;

            $response = ['token'=>$token];
            return response($response, 200);
        }
    }
}
