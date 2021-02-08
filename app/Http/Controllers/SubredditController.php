<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Ability;
use Illuminate\Http\Request;
use App\Models\Subreddit;
use Illuminate\Support\Facades\Auth;

class SubredditController extends Controller
{
    public function index($subreddit) {
        
        return view('subreddits.index', [
            'subreddit' => Subreddit::where('name', $subreddit)->first()
        ]);
    }
    
    public function create() {
        return view('subreddits.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $sub = Subreddit::create([
                'name' => $request->name,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'type' => $request->type
        ]);

        // ALSO CREATE A ROLE WITH IT
        $role = Role::create(['name' => $request->name . "_mod"]);
        // // grabs the ability to sticky and approve posts
        // $approve_post = Ability::whereName('approve_post')->first();
        // $sticky_post = Ability::whereName('sticky_post')->first();
        // $role->allowTo($approve_post);
        // $role->allowTo($sticky_post);

        // now the user is also the moderator of the subreddit
        auth()->user()->assignRole($role);

        

        return redirect("/r/{$sub->name}");
    }
    
}
