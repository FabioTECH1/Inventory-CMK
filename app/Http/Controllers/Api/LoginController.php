<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Registrer new user
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['status' => 200, 'info' => 'Registration Successful']);
    }

    // Login for admin/user to generate jwt token
    public function login(Request $request)
    {
        $creds = $request->only('username', 'password');
        if ($token = auth()->attempt($creds)) {
            return response()->json(['token' => $token]);
        } else return response()->json(['error' => 'incoreect username/password']);
    }
}
