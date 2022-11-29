<?php

namespace Companue\PackageSkeleton\Providers;

use Companue\PackageSkeleton\PackageSkeleton;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(
            $this->basePath('resources/views/'),
            'package-skeleton'
        );

        $this->loadMigrationsFrom(
            $this->basePath('database/migrations')
        );

        $this->loadTranslationsFrom(
            $this->basePath('lang'),
            'package-skeleton'
        );

        $this->loadJsonTranslationsFrom(
            $this->basePath('lang/json')
        );

        $this->publishes([
            $this->basePath('lang') => base_path('lang/vendor/package-skeleton')
        ], 'package-skeleton-translations');

        $this->publishes([
            $this->basePath('database/migrations') => database_path('migrations')
        ], 'package-skeleton-migrations');

        $this->publishes([
            $this->basePath('resources/views/') => resource_path('views/vendor/package-skeleton')
        ], 'package-skeleton-views');

        $this->publishes(
            [
                $this->basePath('config/package-skeleton.php') => base_path('config/package-skeleton.php')
            ],
            'package-skeleton-configuration'
        );

        $this->publishes([
            $this->basePath('/resources/static') => public_path('vendor/package-skeleton')
        ], 'package-skeleton-assets');
    }

    public function register()
    {
        $this->app->bind('package-skeleton', function () {
            return new PackageSkeleton;
        });

        $this->mergeConfigFrom($this->basePath('config/package-skeleton.php'), 'package-skeleton');
    }

    protected function basePath($path = '')
    {
        return __DIR__ . '/../../' . $path;
    }
}
