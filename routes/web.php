<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/consulta-patente', function() {
    return view('consultapatente');
})->name('patente.consulta')->middleware('auth.custom');

Route::get('/login-sucesso', function() {
    if (!session()->has('usuario')) {
        return redirect('/login')->with('error', 'Acesso não autorizado');
    }
    return view('loginSucesso');
})->name('login.sucesso');
