<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\CreateRifa;
use App\Livewire\Dashboard;
use App\Livewire\EditRifa;
use App\Livewire\HelpView;
use App\Livewire\UserCrud;
use App\Livewire\ViewRifa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class);

    Route::get('/usuarios', UserCrud::class)->name('users.index');


    Route::get("/ayuda", HelpView::class)->name("help");

    Route::get('/rifas', ViewRifa::class)->name('rifas.index');

    Route::get('/rifas/create', CreateRifa::class)->name('rifas.create');
    Route::get('/rifas/{rifa}/edit', EditRifa::class)->name('rifas.edit');
});
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');

Route::get('callback', [GoogleController::class, 'handleGoogleCallback']);
