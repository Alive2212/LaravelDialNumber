<?php

namespace Alive2212\LaravelDialNumber;

use Illuminate\Support\ServiceProvider;

class LaravelDialNumberServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // translations
        $this->loadTranslationsFrom(resource_path('lang/vendor/alive2212'),
            'laravel-dial-number');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/laravel-dial-number.php' => config_path('laravel-dial-number.php'),
            ], 'laravel-dial-number.config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-dial-number.php', 'laravel-dial-number');

        // Register the service the package provides.
        $this->app->singleton('LaravelDialNumber', function ($app) {
            return new LaravelDialNumber;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['LaravelDialNumber'];
    }
}