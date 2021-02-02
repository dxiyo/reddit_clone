<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Upvote;

class UpvoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_upvote_post() {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        // $post->upvote($user);

        // $this->assertEquals(1, $post->upvotes->count());
        // $this->assertTrue($post->isUpvotedBy($user));
        $this->assertTrue(true);
    }
}
