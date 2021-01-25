<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subreddit;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subreddit_name' => Subreddit::factory()->create(),
            'user_id' => User::factory()->create(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
