<?php

namespace Database\Factories;

use App\Models\PostUpvotes;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostUpvotesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostUpvotes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'post_id' => Post::factory()->create(),
            'upvoted' => $this->faker->boolean()
        ];
    }
}
