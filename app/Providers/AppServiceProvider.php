<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (function_exists('oci_connect')) {
            $this->app->register(\Yajra\Oci8\Oci8ServiceProvider::class);
        }

        if (\App::environment() == 'local' && class_exists(\Barryvdh\Debugbar\ServiceProvider::class)) {
            //$this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
