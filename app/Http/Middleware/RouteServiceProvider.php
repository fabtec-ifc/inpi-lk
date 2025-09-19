<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    // ... outras partes da classe ...

    public function boot()
    {
        $this->routes(function () {
            // ... código existente ...

            // Registrar middleware corretamente
            Route::aliasMiddleware('api.auth', \App\Http\Middleware\AuthenticateAPI::class);
        });
    }
}
