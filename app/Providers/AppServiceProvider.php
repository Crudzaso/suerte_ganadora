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
    public function boot(): void
    {
        //
<<<<<<< HEAD
          if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
=======
>>>>>>> 53a09a9 (commit initial)
    }
}
