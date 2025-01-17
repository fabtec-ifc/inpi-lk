<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
})->name('app');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [UserController::class, 'login']);

Route::middleware([Auth::class])->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('search', [UserController::class, 'index'])->name('search');
});


