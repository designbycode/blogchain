<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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


        // Register a custom Blade directive for generating unique slugs
        Str::macro('generateUniqueSlug', function (string $title, Model $model, string $column = 'name', string $slugField = 'slug') {
            $slug = Str::slug($title);
            $originalSlug = $slug;

            while ($model->newQuery()->where($slugField, $slug)->exists()) {
                $slug = $originalSlug . '-' . rand(1000, 9999);
            }

            return $slug;
        });

    }
}
