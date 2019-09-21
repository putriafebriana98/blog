<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestPutri extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
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
    public function testLoginUser()
    {
        $response=$this->get('/logout')
            ->assertRedirect('/');

    }
}
