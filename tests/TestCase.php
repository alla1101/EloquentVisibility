<?php

namespace Alla\Visibility\Tests;

use Alla\Visibility\EloquentVisibilityServiceProvider;
use Orchestra\Testbench\TestCase as TC;

class TestCase extends TC
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            EloquentVisibilityServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
