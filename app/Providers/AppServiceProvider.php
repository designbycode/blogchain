<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        // Set default string length for database schema
        Schema::defaultStringLength(191);

        // Force HTTPS if the app is running in production
        URL::forceHttps(config('app.force_https', false));

        // Register custom Blade components
        Blade::anonymousComponentPath(__DIR__ . '/../../resources/views/layouts/partials', 'app');

        Model::automaticallyEagerLoadRelationships();


    }
}
