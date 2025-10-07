<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TermosPoliticasController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UnidadeController;

// Redireciona a raiz para o login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de login
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Termos e políticas
Route::get('/termos', [TermosPoliticasController::class, 'termos'])->name('termos');
Route::get('/politicas', [TermosPoliticasController::class, 'politicas'])->name('politicas');

// Rotas autenticadas
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/login/sucesso', [RegistroController::class, 'index'])->name('login.sucesso');

    // CRUD de registros
    Route::resource('registros', RegistroController::class);

    // Abrir registros via número
    Route::get('/patente/{numero}', [RegistroController::class, 'abrirPatente'])->name('registro.abrirPatente');
    Route::get('/marca/{numero}', [RegistroController::class, 'abrirMarca'])->name('registro.abrirMarca');

    // CRUD de unidades
    Route::resource('unidades', UnidadeController::class);

    // Página de pesquisa
    Route::get('/pesquisa', function () {
        return view('pesquisa');
    })->name('pesquisa');
});
