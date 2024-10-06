<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processar o login
   // Processar o login
    public function login(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticar o usuário
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Redireciona se o login for bem-sucedido
            return redirect()->intended('dashboard')->with('success', 'Login realizado com sucesso');
        } else {
            dd('Credenciais não correspondem', $credentials);
        }
        
    }


    // Logout do usuário
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout realizado com sucesso');
    }
}
