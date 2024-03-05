<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $cr = $request->only('username', 'password');

        if (!Auth::attempt($cr)) {
            $user = User::where('username', $request->username)->first();

            $errorMessage = $user ? 'Password Salah' : 'Username tidak terdaftar';

            return response()->json(['message' => $errorMessage], 401);
        }

        $user = User::where('username', $request->username)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'succes',
            'token' => $token,
            'type' => 'Bearer'
        ]);
    }
    public function logout(Request $request)
    {
        $acces_token = $request->bearerToken();
        $token = PersonalAccessToken::findToken($acces_token);
        $token->delete();

        return response()->json([
            'status' => 'succes',
            'message' => 'Logout is succes!'
        ]);
    }
}
