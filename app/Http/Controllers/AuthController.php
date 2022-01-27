<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// For hashed password
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register method
    public function register(Request $request)
    {
        // dd('register controller');

        // validating user input
        $request->validate([
            'name'=> 'required|max:255',
            'user_name'=> 'required|min:4|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // storing user in the database
        $user = User::create([
            'name' => $request->name,
            'user_name'=>$request->user_name,
            'avatar'=>$request->avatar,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // handling the api token
         $token = $user->createToken('auth_token')->plainTextToken;

         // sending token as response for user login
         return response()->json([
             'access_token' => $token,
             'token_type' => 'Bearer'
         ]);
    }

    // Login Method

    public function login(Request $request)
    {
        // first checking whether the user exsist in the database
        // If user doesn't exsist then send invalid login response 401
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json([
                'message' => 'Invalid login details'
            ],401);
        }

        // $user = User::where('email', $request->['email'])->firstOrFails();

        $user = User::where('email',$request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'message' => 'Login success'
        ]);
    }

    // logout method
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

    }


}
