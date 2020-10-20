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

        $this->app->bind(Directus::class, function ($app) {
            return new Directus();
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