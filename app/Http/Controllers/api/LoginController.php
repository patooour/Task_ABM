<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:80',
            'password' => 'required|max:100',
        ]);

        $user = User::whereEmail($request->email)->first();
        if ($user && Hash::check($request->password , $user->password)) {
            $token = $user->createToken('user-token')->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Login Successful',
                'token' => $token,
            ]); }
            return response()->json([
                'status' => false,
                'message' => 'Login Failed',
                'token' => null,
            ]);

    }
}
