<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('loginSucesso', [
            'usuario' => Auth::user()
        ]);
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string'
        ]);

        try {
            $response = Http::timeout(10)->post('http://200.135.58.39:5000/login', [
                'login' => $validated['login'],
                'senha' => $validated['senha']
            ]);

            $responseData = $response->json();

            if ($response->successful() && isset($responseData['detalhes'])) {
                // Buscar ou criar o usuário no banco
                $user = User::firstOrCreate(
                    ['email' => $validated['login']], // use 'email' ou 'login', dependendo do seu banco
                    ['name' => $validated['login'], 'password' => bcrypt('senha-fake')] // senha fake apenas para evitar erro
                );

                // Autenticar o usuário
                Auth::login($user);
                session(['token' => $responseData['detalhes']]);

                return redirect()->route('login.sucesso');
            }

            return back()->withErrors([
                'login' => $responseData['resultado'] ?? 'Credenciais inválidas'
            ]);

        } catch (\Exception $e) {
            return back()->withErrors([
                'login' => 'Erro no servidor: ' . $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
