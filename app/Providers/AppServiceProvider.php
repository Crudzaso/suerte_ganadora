<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
<<<<<<< HEAD
        //
          if($this->app->environment('production')) {
            \URL::forceScheme('https');
=======
        // Forzar HTTPS
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
>>>>>>> 1549efa (feat: Implementation of messages to discord)
        }
    }
}
