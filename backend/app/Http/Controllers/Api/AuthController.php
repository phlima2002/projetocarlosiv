<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Auth ainda é usado
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Registra um novo usuário.
     * (Este método não muda)
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user
        ], 201);
    }

    /**
     * Tenta logar o usuário e retorna um API Token.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 1. Tenta encontrar o usuário pelo email
        $user = User::where('email', $request->email)->first();

        // 2. Verifica o usuário e a senha
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciais incorretas'
            ], 401); // 401 Unauthorized
        }

        // 3. Revoga tokens antigos (opcional, mas bom para segurança)
        // $user->tokens()->delete();

        // 4. Cria o novo token
        $token = $user->createToken('auth_token_para_' . $user->name)->plainTextToken;

        // 5. Retorna o token e os dados do usuário
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * Faz logout (Revoga o token atual).
     */
    public function logout(Request $request)
    {
        // Revoga o token que foi usado para fazer esta requisição
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }

    /**
     * Retorna o usuário autenticado atualmente (via token).
     */
    public function me(Request $request)
    {
        // O middleware 'auth:sanctum' já cuidou de encontrar
        // o usuário através do token enviado.
        return $request->user();
    }
}

