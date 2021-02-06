<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UpvoteCommentController extends Controller
{
    public function store(User $user, Comment $comment) {
        $comment->upvote($user);
        return back();
    }
}
