<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PutriTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->get('/')->assertSee('Putria\'s Blog');
        //Given I have 2 record in the DB that are posts
        //and each one is posted month apart
        $first=factory(Post::class)->create();
        $second=factory(Post::class)->create([
            'created_at'=>\Carbon\Carbon::now()->subMonth()
        ]);

        //when I fetch into the archives
        $posts=Post::archives();


        //then the response should be in the proper format
        $this->assertCount(2,$posts);

    }
}
