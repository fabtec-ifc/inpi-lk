<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAPI
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'Faça login primeiro');
        }

        return $next($request);
    }
}
