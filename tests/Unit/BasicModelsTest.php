<?php

namespace Alla\Visibility\Tests\Unit;

use Alla\Visibility\Models\Status;
use Alla\Visibility\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicModelsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function createRows()
    {
        $status_model = new Status;

        $status = ["customer", "admin", "superadmin"];

        foreach ($status as $str_key) {
            $status_model::create([
                "str_key" => $str_key
            ]);
        }

        foreach ($status as $str_key) {
            $st = $status_model->where("str_key", $str_key)->firstOrFail();
            $this->assertEquals($st->str_key, $str_key);
        }
    }
}
