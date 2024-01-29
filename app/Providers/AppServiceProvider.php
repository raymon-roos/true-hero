<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations(); // Get rid of the `personal_access_tokens` table, we're not building an API
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
