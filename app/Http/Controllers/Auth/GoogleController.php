<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    //

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar la respuesta de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Buscar el usuario en la base de datos
        $user = User::where('email', $googleUser->getEmail())->first();

        // Si el usuario no existe, crear uno nuevo
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt("juan"), // Genera una contraseña aleatoria
            ]);
        }

        // Iniciar sesión
        Auth::login($user, true);

        // Redirigir a la ruta deseada
        return redirect()->route('dashboard'); // Cambia a la ruta que necesites
    }
}
