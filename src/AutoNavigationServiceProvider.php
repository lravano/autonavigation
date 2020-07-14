<?php

namespace Rider\Autonavigation;

use Illuminate\Support\ServiceProvider;

class AutoNavigationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/autonavigation.php' => config_path('autonavigation.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
       
        $this->app->bind('autonavigation_client',function() {
            return new \Rider\Autonavigation\AutoNavigationClient(config('autonavigation.server'),config('autonavigation.timeout'));
        });
        
    }
}
