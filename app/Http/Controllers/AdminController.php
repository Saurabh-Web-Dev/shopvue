<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin';

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => '200',
                'message' => 'Login successful',
                'token' => Auth::user()->authTokenEncode(Auth::user())
            ], 200);
        }

        return response()->json([
            'status' => '401',
            'message' => 'Wrong credentials'
        ], 401);
    }
}
