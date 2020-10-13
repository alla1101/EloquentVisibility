<?php

namespace Alla\Visibility;

use Illuminate\Support\ServiceProvider;

class EloquentVisibilityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
        }
    }

    public function register()
    {
    }
}
