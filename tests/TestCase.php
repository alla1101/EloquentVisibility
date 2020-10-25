<?php

namespace Alla\Visibility\Tests;

use Alla\Visibility\EloquentVisibilityServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as TC;
use DB;

class TestCase extends TC
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup

        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {
        return [
            EloquentVisibilityServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'eloquentvisibility',
            'username' => 'root',
            'password' => 'secret'
        ]);
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {

        // Custom Code

        // Original Code
        parent::tearDown();
    }
    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        // Migrate Service Tables
        include_once __DIR__ . '/../Database/Migrations/create_eloquent_visibility_table.php.stub';
        include_once __DIR__ . '/../Database/Migrations/create_statuses_table.php.stub';
        include_once __DIR__ . '/../Database/Migrations/create_visibility_status_relations_table.php.stub';

        (new \CreateVisibilityStatusRelationsTable())->down();
        (new \CreateEloquentVisibilityTable())->down();
        (new \CreateStatusesTable())->down();

        (new \CreateEloquentVisibilityTable())->up();
        (new \CreateStatusesTable())->up();
        (new \CreateVisibilityStatusRelationsTable())->up();
    }
}
