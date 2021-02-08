<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // this is used to determine if the user can do a certain thing
        // Gate::before(function ($user, $ability) {
        //     return $user->abilities()->contains($ability);
        // });

        Gate::define('delete_post', function(User $user, $post) {
            if($user->allPosts()->contains($post) || $post->subreddit->isModeratedBy($user)) {
                return true;
            }
        });

    }
}
