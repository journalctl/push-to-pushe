<?php

namespace Journalctl\PushToPushe;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Journalctl\PushToPushe
 */
class PushToPusheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        if (config('push-to-pushe.grab_pushe_ids')) {
            $this->registerRoutes();
        }

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();

            $this->registerConfigs();
        }
    }

    /**
     * Binds the PushToPushe routes into the controller.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $options = [
            'namespace' => '\Journalctl\PushToPushe\Http\Controllers',
        ];

        Route::group($options, function ($router) {

            $router->group(['middleware' => config('push-to-pushe.middleware')], function ($router) {
                $router->post(config('push-to-pushe.route'), [
                    'uses' => 'RegisterController@register',
                    'as' => 'push-to-pushe.register',
                ]);
            });

        });
    }


    /**
     * Register PushToPushe migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register PushToPush config file.
     *
     */
    public function registerConfigs()
    {
        $this->publishes([
            __DIR__ . '/../config/push-to-pushe.php' => config_path('push-to-pushe.php'),
        ]);
    }

}
