<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller {

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'language' => 'pt',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return response()->json([
            'code' => 'register_success',
            'user' => $user,
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json([
                'code' => 'email_not_found',
            ], 401);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'code' => 'invalid_password',
            ], 401);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return response()->json([
            'code' => 'login_success',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }

    public function forgotPassword(){

    }
}