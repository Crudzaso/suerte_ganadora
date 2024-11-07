<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    /**
     * Redirigir al usuario a Google para autenticación.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Manejar la respuesta de Google.
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtener la información del usuario desde Google
            $googleUser = Socialite::driver('google')->user();

            // Verificar si el usuario existe en nuestra base de datos
            $user = User::where('email', $googleUser->getEmail())->first();

            // Si el usuario no existe, creamos uno nuevo
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Contraseña generada aleatoriamente
                ]);
            }

            // Iniciar sesión con el usuario
            Auth::login($user, true);

            // Redirigir a la página principal o al dashboard
            return redirect()->route('/dashboard'); // Cambia a la ruta que necesites

        } catch (\Exception $e) {
            // Manejar errores de conexión con Google
            return redirect()->route('login')->with('error', 'Error al intentar iniciar sesión con Google. Por favor, intenta de nuevo.');
        }
    }
}
