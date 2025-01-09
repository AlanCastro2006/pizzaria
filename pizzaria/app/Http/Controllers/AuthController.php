<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'email_usuario' => 'required|email',
            'senha_usuario' => 'required',
        ]);

        // Tentativa de autenticação personalizada
        $credentials = [
            'email_usuario' => $request->email_usuario,
            'password' => $request->senha_usuario, // A senha será verificada manualmente
        ];

        $user = \App\Models\User::where('email_usuario', $credentials['email_usuario'])->first();

        if ($user && Hash::check($credentials['password'], $user->senha_usuario)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Redireciona para a home (ou outro local)
            return redirect()->intended('/admin/buttons');
        }

        // Retorna erro se as credenciais forem inválidas
        return back()->withErrors([
            'email_usuario' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email_usuario');
    }
}
