<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function systemAuth(Request $req)
    {
        $credentials = $req->only('email','password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'stats' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Invalid',
        ],401); 
    }

    public function systemLogout(Request $req)
    {
        return $req->user()->currentAccessToken()->delete();
    }
}
