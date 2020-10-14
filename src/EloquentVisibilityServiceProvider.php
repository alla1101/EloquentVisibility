<?php

namespace Alla\Visibility;

use Illuminate\Support\ServiceProvider;

class EloquentVisibilityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->migrations();
        }
    }

    private function migrations()
    {
        $to_be_published = [];

        $stub_directory = __DIR__ . '/../Database/Migrations/';

        $migrated_classes_to_folders = [
            [
                'class' => 'CreateEloquentVisibilityTable',
                'file_name' => 'create_eloquent_visibility_table'
            ],
            [
                'class' => 'CreateStatusesTable',
                'file_name' => 'create_statuses_table'
            ],
            [
                'class' => 'CreateVisibilityStatusRelationsTable',
                'file_name' => 'create_visibility_status_relations_table'
            ]
        ];

        foreach ($migrated_classes_to_folders as $m_c_to_f)

            if (!class_exists($m_c_to_f["class"])) {
                $full_file_name = database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $m_c_to_f["file_name"] . '.php');
                $key = $stub_directory . $m_c_to_f["file_name"] . '.php.stub';
                $to_be_published[$key] = $full_file_name;
            }

        if ($this->hasMigrations($to_be_published)) {

            $this->publishes($to_be_published, 'migrations');
        }
    }

    public function register()
    {
    }

    private function hasMigrations($to_be_published)
    {
        return count($to_be_published) != 0;
    }
}
