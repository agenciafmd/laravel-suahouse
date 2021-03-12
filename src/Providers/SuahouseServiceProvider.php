<?php

namespace Agenciafmd\Suahouse\Providers;

use Illuminate\Support\ServiceProvider;

class SuahouseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function providers()
    {
        $this->app->register(BladeServiceProvider::class);
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-suahouse.php', 'laravel-suahouse');
    }
}
