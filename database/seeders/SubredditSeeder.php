<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subreddit;
use App\Models\Post;

class SubredditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subreddit::factory()
                ->count(4)
                ->hasPosts(5)
                ->create();
    }
}
