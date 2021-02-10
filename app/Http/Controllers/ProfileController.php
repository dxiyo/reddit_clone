<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($user) {
        $theUser = User::whereName($user)->first();
        return view('profile.show', [
            'user' => $theUser,
            'things' => $theUser->allContent(),
            'inOverview' => 'text-blue-600 border-b-2 border-blue-600',
            'inComments' => '',
            'inPosts' => ''
        ]);
    }
    
    public function list($user, $listItem) {
        $theUser = User::whereName($user)->first();
        $inPosts = '';
        $inComments = '';
        switch($listItem) {
            case 'posts':
                $things = $theUser->allPostsWithUpvotes();
                $inPosts = 'text-blue-600 border-b-2 border-blue-600';
                break;
            case 'comments':
                $things = $theUser->commentsUpvotes();
                $inComments = 'text-blue-600 border-b-2 border-blue-600';
                break;
        }
        return view('profile.show', [
            'user' => $theUser,
            'things' => $things,
            'inOverview' => '',
            'inPosts' => $inPosts,
            'inComments' => $inComments

        ]);
    }
}
