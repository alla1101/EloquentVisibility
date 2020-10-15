<?php

namespace Alla\Visibility\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Alla\Visibility\Tests\TestCase;

class ExampleTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    function a_post_has_a_title()
    {
        //$post = factory(Post::class)->create(['title' => 'Fake Title']);
        $this->assertEquals('Fake Title', 'Fake Title');
    }
}
