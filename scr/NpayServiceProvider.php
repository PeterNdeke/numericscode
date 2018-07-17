<?php

namespace Numericscode\Npay;

use Illuminate\Support\ServiceProvider;

class NpayServiceProvider extends ServiceProvider
{
    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;
    /**
    * Publishes all the config file this package needs to function
    */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/npay.php');
        $this->publishes([
            $config => config_path('npay.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-npay', function () {
            return new Npay;
        });
    }
    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
        return ['laravel-npay'];
    }
}
