<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(Request $request)
{
    $validated = $request->validate([
        'login' => 'required|string',
        'senha' => 'required|string'
    ]);

    $response = Http::post('http://200.135.58.39:5000/login', [
        'login' => $validated['login'],
        'senha' => $validated['senha']
    ]);

    $responseData = $response->json();

    if (isset($responseData['detalhes'])) {
        session([
            'usuario' => $validated['login'],
            'token' => $responseData['detalhes']
        ]);

        return view('loginSucesso');
    }

    return back()->with('error', $responseData['resultado'] ?? 'Credenciais inválidas');
    }
}
