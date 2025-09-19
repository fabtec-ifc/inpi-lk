<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSession
{
    /**
     * Handle an incoming request.
     *
     * Verifica se o usuário está autenticado via sessão (token).
     * Se não estiver, redireciona para a página de login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('token')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
