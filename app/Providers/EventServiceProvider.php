<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Events\UserRestore;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\SendDiscordNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreated::class => [
            SendDiscordNotification::class,
        ],
        UserUpdated::class => [
            SendDiscordNotification::class,
        ],
        UserDeleted::class => [
            SendDiscordNotification::class,
        ],
        UserRestore::class => [
            SendDiscordNotification::class,
        ],
        Login::class => [
            SendDiscordNotification::class,
        ],
        Registered::class => [
            SendDiscordNotification::class,
        ],
    ];
}
