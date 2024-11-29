<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Events\UserRestore;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use App\Services\DiscordNotifier;


class SendDiscordNotification
{
    protected $discordNotifier;

    public function __construct(DiscordNotifier $discordNotifier)
    {
        $this->discordNotifier = $discordNotifier;
    }

    public function handleUserCreated(UserCreated $event): void
    {
        $this->sendNotification($event->user, 'creado', auth()->user());
    }


    public function handleUserUpdated(UserUpdated $event): void
    {
        $this->sendNotification($event->user, 'actualizado', auth()->user());
    }


    public function handleUserDeleted(UserDeleted $event): void
    {
        $this->sendNotification($event->user, 'eliminado', auth()->user());
    }


    public function handleUserRestore(UserRestore $event): void
    {
        $this->sendNotification($event->user, 'restaurado', auth()->user());
    }


    public function handleUserLogin(Login $event): void
    {
         $actor = auth()->user() ?: $event->user;
         $authMethod = session('auth_method', 'Usuario');
         $this->sendNotification($event->user, 'ingreso', $actor, $authMethod);
    }

    public function handleRegistered(Registered $event): void
    {
    $this->sendNotification($event->user, 'registrado', $event->user ?: auth()->user());
    }


    protected function sendNotification($user, $action, $actor, $authMethod = 'Usuario')
{
    $colors = [
        'creado' => '28a745',
        'actualizado' => 'ffc107',
        'eliminado' => 'dc3545',
        'restaurado' => '17a2b8',
        'ingreso' => '007bff',
        'registrado' => '17c671',
    ];

    $color = $colors[$action] ?? 'ffffff';

    $embed = [
        'title' => "🎲  **Suerte ganadora**  🎲",
        'description' => "## **Usuario {$action}**",
        'color' => hexdec($color),
        'fields' => [
            [
                'name' => '🔑 **ID de usuario**',
                'value' => "`{$user->id}`",
                'inline' => true,
            ],
            [
                'name' => '👤 **Nombre de usuario**',
                'value' => "`{$user->name}`",
                'inline' => true,
            ],
            [
                'name' => '⚙️ **Rol**',
                'value' => $user->getRoleNames()->isEmpty() ? 'Sin rol' : $user->getRoleNames()->implode(', '),
                'inline' => true,
            ],
            [
                'name' => '🔒 **Método de Autenticación**',
                'value' => "`{$authMethod}`",
                'inline' => true,
            ],
            [
                'name' => '📧 **Correo Electrónico**',
                'value' => "`{$user->email}`",
                'inline' => false,
            ],
            [
                'name' => '🛠️ **Realizado por**',
                'value' => "**`{$actor->name}`** con el **`ID: {$actor->id}`**\nrol: **`{$actor->getRoleNames()->implode(', ')}`**",
                'inline' => false,
            ],
        ],
        'footer' => [
            'text' => implode(" | ", [
                '🔔 Notificación de suerte ganadora',
            ]),
        ],
        'timestamp' =>now()->toIso8601String(),

        'thumbnail' => [
            'url' => 'https://res.cloudinary.com/djmqgrcci/image/upload/v1732832132/suerte_ganadora_logo_phrase_s2ikl1.jpg',
        ],
    ];

    try {
        $this->discordNotifier->sendEmbed($embed);
    } catch (\Exception $e) {
        \Log::error("Error al enviar notificación de Discord: " . $e->getMessage());
    }
}
}
