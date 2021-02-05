<?php

namespace Database\Factories;

use App\Models\ImagePost;
use App\Models\User;
use App\Models\Subreddit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagePostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImagePost::class;

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
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
