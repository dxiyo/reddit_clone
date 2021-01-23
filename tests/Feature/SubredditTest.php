<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subreddit;

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

        $response = $this->get('/r/funny');

        $response->assertStatus(200);
    }
}
