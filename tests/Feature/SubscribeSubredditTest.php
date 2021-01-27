<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subreddit;
use App\Models\User;
use App\Models\Post;

class SubscribeSubredditTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_can_subscribe_to_subreddit()
    {
        $subreddit = Subreddit::factory()->create();
        $user = User::factory()->create();
        $user->subscribe($subreddit);
        $this->assertInstanceOf(Subreddit::class, $user->subscribed->first());
    }

    // public function test_user_can_subscribe_to_subreddit_with_a_click_of_a_button()
    // {
    //     $subreddit = Subreddit::factory()->create();
    //     $user = User::factory()->create();

    //     $respomse = $this->actingAs($user)
    //                      ->post("/r/$subreddit->name");
                         
    //     $respomse->assertContains($subreddit, $user->subscribed);
        
    // }
}
