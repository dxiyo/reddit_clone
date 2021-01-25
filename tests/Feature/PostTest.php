<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subreddit;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_can_be_made()
    {
        $post = Post::factory()->create();

        $this->assertDatabaseCount('posts', 1);
    }

    public function test_post_can_be_visited()
    {
        $post = Post::factory()->create();
        $response = $this->get("/r/$post->subreddit_name/comments/$post->title");

        $response->assertStatus(200);
    }
}
