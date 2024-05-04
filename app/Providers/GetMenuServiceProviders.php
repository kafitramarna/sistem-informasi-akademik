<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetMenuServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path('/Helpers/getMenu.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
