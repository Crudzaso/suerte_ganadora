<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\UserCrud;
use App\Livewire\Usermanagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Ruta para redirigir a Google
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');

// Ruta para manejar el callback de Google
Route::get('callback', [GoogleController::class, 'handleGoogleCallback']);
