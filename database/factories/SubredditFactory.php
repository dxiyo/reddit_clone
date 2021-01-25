<?php

namespace Database\Factories;

use App\Models\Subreddit;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubredditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subreddit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence
        ];
    }
}
