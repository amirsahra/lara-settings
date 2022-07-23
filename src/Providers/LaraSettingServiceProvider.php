<?php

namespace Amirsahra\LaraSetting\Providers;

use Amirsahra\LaraSetting\LaraSetting;
use Illuminate\Support\ServiceProvider;

class LaraSettingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('LaraSetting', function () {
            return new LaraSetting();
        });

        $this->mergeConfigFrom(__DIR__.'/../Configs/larasetting.php','larasetting');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Databases/Migrations');
        $this->publishes([
            __DIR__.'/../Configs/larasetting.php' => config_path('LaraSetting.php')
        ],'lara-settings');
        $this->publishes([
            __DIR__.'/../Databases/Migrations/' => database_path('migrations'),
        ],'lara-settings');


    }
}