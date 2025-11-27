<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function register(Request $request)
{
    // Validación
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // Crear usuario
    $user = User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    // Crear token
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Usuario registrado correctamente',
        'user'    => $user,
        'token'   => $token
    ], 201);
}

    public function login(Request $request)
    {
        // VALIDACIÓN
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // VERIFICAR USUARIO
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales incorrectas.'],
            ]);
        }

        // TOKEN
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login correcto',
            'token' => $token
        ]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada'
        ]);
    }
}
