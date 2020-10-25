<?php

namespace Alla\Visibility\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Alla\Visibility\Tests\TestCase;

class ExampleTest extends TestCase
{

    /** @test */
    function does_it_work()
    {
        //$post = factory(Post::class)->create(['title' => 'Fake Title']);
        $this->assertEquals('Fake Title', 'Fake Title');
    }
}
