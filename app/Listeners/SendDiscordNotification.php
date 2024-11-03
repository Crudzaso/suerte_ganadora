<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Events\UserRestore;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use App\Providers\EventServiceProvider;
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
        $this->sendNotification($event->user, 'ingreso', $actor);
    }

    public function handleRegistered(Registered $event): void
    {
    $this->sendNotification($event->user, 'registrado', $event->user); // O auth()->user() 
    }
    

    protected function sendNotification($user, $action, $actor)
    {
        
        $colors = [
            'creado' => '00ff00', 
            'actualizado' => 'ffcc00', 
            'eliminado' => 'ff0000', 
            'restaurado' => 'ffff00', 
            'ingreso' =>  '0000ff',
            'registrado' => '00ffff', 
        ];
    
        
        $color = $colors[$action] ?? 'ffffff'; 
    
        $embed = [
            'title' => "🎲  **Suerte ganadora**  🎲", 
            'description' => "## **Usuario {$action}**", 
            'color' => hexdec($color), 
            'fields' => [
                
                [
                    'name' => '🔑 **ID de usuario**',
                    'value' => "{$user->id}",
                    'inline' => true,
                ],
                [
                    'name' => '👤 **Nombre de usuario**',
                    'value' => "{$user->name}",
                    'inline' => false,
                ],
                [
                    'name' => '📧 **Correo Electrónico**',
                    'value' => $user->email,
                    'inline' => false,
                ],
                [
                    'name' => '🛠️ **Realizado por**', 
                    'value' => "**{$actor->name}** con el **ID: {$actor->id}** ",
                    'inline' => false,
                ],
            ],
            'footer' => [
                'text' => implode(" | ", [
                    'Notificación de suerte ganadora',
                ]),
            ],
            'timestamp' => now()->toIso8601String(),
            'thumbnail' => [
                    'url' => 'https://i.imgur.com/RuwKVmq.jpeg', // Agrega una URL de imagen pequeña
                ],
            
        ];
    
        try {
            
            $this->discordNotifier->sendEmbed($embed);
        } catch (\Exception $e) {
            \Log::error("Error al enviar notificación de Discord: " . $e->getMessage());
        }
    }
    
}
