<?php

namespace Companue\ServiceAdapter\Providers;

use Companue\ServiceAdapter\ServiceAdapter;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(
            $this->basePath('resources/views/'),
            'service-adapter'
        );

        $this->loadMigrationsFrom(
            $this->basePath('database/migrations')
        );

        $this->loadTranslationsFrom(
            $this->basePath('lang'),
            'service-adapter'
        );

        $this->loadJsonTranslationsFrom(
            $this->basePath('lang/json')
        );

        $this->publishes([
            $this->basePath('lang') => base_path('lang/vendor/service-adapter')
        ], 'service-adapter-translations');

        $this->publishes([
            $this->basePath('database/migrations') => database_path('migrations')
        ], 'service-adapter-migrations');

        $this->publishes([
            $this->basePath('resources/views/') => resource_path('views/vendor/service-adapter')
        ], 'service-adapter-views');

        $this->publishes(
            [
                $this->basePath('config/service-adapter.php') => base_path('config/service-adapter.php')
            ],
            'service-adapter-configuration'
        );

        $this->publishes([
            $this->basePath('/resources/static') => public_path('vendor/service-adapter')
        ], 'service-adapter-assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                // ConsoleCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('service-adapter', function () {
            return new ServiceAdapter;
        });

        $this->mergeConfigFrom($this->basePath('config/service-adapter.php'), 'service-adapter');
    }

    protected function basePath($path = '')
    {
        return __DIR__ . '/../../' . $path;
    }
}
