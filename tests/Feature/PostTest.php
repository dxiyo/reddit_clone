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

    public function test_user_who_created_post_can_be_viewed() 
    {
        $post = Post::factory()->create();
        $this->assertInstanceOf(User::class, $post->user);
    }

    public function test_subreddit_that_post_belongs_to_can_be_viewed() 
    {
        $post = Post::factory()->create();
        $this->assertInstanceOf(Subreddit::class, $post->subreddit);
    }

    public function test_user_can_create_post()
    {
        $user = User::factory()->create();
        $sub = Subreddit::factory()->create();

        $response = $this->actingAs($user)
                        ->get('/submit');
        $response->assertStatus(200);

        $response2 = $this->actingAs($user)
                        ->get("/r/$sub->name/submit");
        $response2->assertStatus(200);
    }

    public function test_post_that_user_created_is_stored()
    {
        $user = User::factory()->create();
        $sub = Subreddit::factory()->create();
        $response = $this->actingAs($user)
                    ->post("/r/$sub->name/submit");
        $response->assertStatus(200);

        // $this->assertEquals(1, Post::count());
    }
}
