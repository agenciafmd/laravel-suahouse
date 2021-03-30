<?php

namespace Agenciafmd\Suahouse\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadBladeComponents();

        $this->loadBladeDirectives();

        $this->loadBladeComposers();

        $this->loadViews();

        $this->publish();
    }

    public function register()
    {
        //
    }

    protected function loadBladeComponents()
    {
        //
    }

    protected function loadBladeComposers()
    {
        //
    }

    protected function loadBladeDirectives()
    {
        //
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'agenciafmd/suahouse');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'suahouse');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/suahouse'),
        ], 'laravel-suahouse:views');
    }
}
