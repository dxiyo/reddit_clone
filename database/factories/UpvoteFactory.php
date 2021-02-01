<?php

namespace Database\Factories;

use App\Models\Upvote;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpvoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upvote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'upvoteable_id' => Post::factory()->create(),
            'upvoteable_type' => 'App\Models\Post',
            'upvoted' => $this->faker->boolean()
        ];

    }
}
