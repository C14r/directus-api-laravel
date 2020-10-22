<?php

namespace C14r\Directus\Laravel;

use Illuminate\Support\ServiceProvider;

class DirectusServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/directus.php' => config_path('directus.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/directus.php', 'directus'
        );

        $this->app->singleton(Directus::class, function ($app, $connection = null) {
            return Directus::getInstance($connection);
        });

        $this->app->singleton('directus', function ($app, $connection = null) {
            return Directus::getInstance($connection);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Directus::class];
    }

}