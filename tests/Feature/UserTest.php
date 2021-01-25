<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subreddit;
use App\Models\User;
use App\Models\Post;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_posts_of_user_can_be_viewed()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Post::class, $user->posts->first());
    }

    public function test_subreddits_owned_by_user_can_be_viewed()
    {
        $user = User::factory()->create();
        $subreddit = Subreddit::factory()->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Subreddit::class, $user->subreddits_owned->first());
    }
}
