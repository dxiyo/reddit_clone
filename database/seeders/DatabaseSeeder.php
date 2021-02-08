<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Subreddit;
use App\Models\Role;
use App\Models\Ability;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // creates a bunch of posts and parent subreddits and comments
        Post::factory()
            ->count(8)
            ->hasComments(3)
            ->create();

        // gives every subreddit a moderator role
        Subreddit::all()->map(function ($sub) { 
            Role::create(['name' => $sub->name . "_moderator"]); 
        });

        // // grabs the ability to sticky and approve posts
        // $approve_post = Ability::whereName('approve_post')->first();
        // $sticky_post = Ability::whereName('sticky_post')->first();

        // // gets all the moderator roles
        // $moderators = Role::where('name', 'like', '%_moderator')->get();

        // // gives all the moderators the ability to sticky and approve posts
        // $moderators->map->allowTo($approve_post);
        // $moderators->map->allowTo($sticky_post);
    }
}
