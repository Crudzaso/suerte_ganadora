<?php

use App\Http\Controllers\Auth\GoogleController;
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

    Route::get('/usuarios', function () {
        return view('users.index');
    });

});

Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');

Route::get('callback', [GoogleController::class, 'handleGoogleCallback']);
