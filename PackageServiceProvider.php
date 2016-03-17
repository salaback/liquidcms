<?php

namespace Salaback\LiquidCMS;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        $this->publishes([
            __DIR__ . '/src/config.php' => config_path('liquid.php'),
        ]);

        $this->publishes([
            __DIR__ . '/src/assets' => public_path('vendor/liquidcms'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/src/migrations/' => database_path('migrations')
        ], 'migrations');



        //Load in the classes


    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'liquid');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
