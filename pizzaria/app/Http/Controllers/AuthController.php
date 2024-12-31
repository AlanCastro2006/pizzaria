<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentativa de autenticação
        if (Auth::attempt(['email_usuario' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redireciona para a home (ou outro local)
            return redirect()->intended('/');
        }

        // Retorna erro se as credenciais forem inválidas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }
}
