<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TermosPoliticasController;
use App\Http\Controllers\ConsultaPatenteController;
use App\Http\Controllers\ConsultaMarcaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ApiRegistroController;

// Redireciona a raiz para o login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de login
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

// Termos e políticas
Route::get('/termos', [TermosPoliticasController::class, 'termos'])->name('termos');
Route::get('/politicas', [TermosPoliticasController::class, 'politicas'])->name('politicas');

// Consultas públicas
Route::post('/consultar/patente', [ConsultaPatenteController::class, 'consultar'])->name('patentes.consultar');
Route::post('/consultar/marca', [ConsultaMarcaController::class, 'consultar'])->name('marcas.consultar');

// Todas as rotas que precisam de autenticação
Route::middleware(['auth'])->group(function () {

    // Página inicial após login
    Route::get('/login/sucesso', [HomeController::class, 'index'])->name('login.sucesso');

    // Página de pesquisa
    Route::get('/pesquisa', function () {
        return view('pesquisa');
    })->name('pesquisa');

    // CRUD completo de registros
    Route::resource('registros', RegistroController::class);

    // API de registros
    Route::get('/api/registros/{numero}', [ApiRegistroController::class, 'show'])->name('api.registros.show');

    // CRUD de unidades
    Route::resource('unidades', UnidadeController::class);

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
