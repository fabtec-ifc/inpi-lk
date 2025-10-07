<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return view('login', [
            'errors' => session('errors') ?: new \Illuminate\Support\MessageBag()
        ]);
    }

    public function sucesso()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        return view('loginSucesso', [
            'usuario' => Auth::guard('web')->user()
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string'
        ]);

        // Criar ou buscar usuário
        $user = User::firstOrCreate(
            ['email' => $request->login],
            ['name' => $request->login, 'password' => bcrypt('senha-fake')]
        );

        // Autenticar usuário
        Auth::guard('web')->login($user);

        // Regenerar sessão
        $request->session()->regenerate();

        // Redirecionar para página de sucesso
        return redirect()->route('login.sucesso');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
