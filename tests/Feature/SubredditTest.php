<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subreddit;
use App\Models\User;
use App\Models\Post;

class SubredditTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_subreddit_can_be_visited()
    {
        $subreddit = Subreddit::factory()->create([
            'name' => 'funny'
        ]);

        $response = $this->actingAs($subreddit->owner)
                         ->get('/r/funny');

        $response->assertStatus(200);
    }
    
    public function test_user_who_created_subreddit_can_be_viewed() 
    {
        $subreddit = Subreddit::factory()->create();
        $this->assertInstanceOf(User::class, $subreddit->owner);
    }

    public function test_posts_that_belong_to_subreddit_can_be_viewed() 
    {
        $subreddit = Subreddit::factory()->create();
        $post = Post::factory()->create(['subreddit_name' => $subreddit->name]);
        $this->assertInstanceOf(Post::class, $subreddit->posts->first());
    }
}
