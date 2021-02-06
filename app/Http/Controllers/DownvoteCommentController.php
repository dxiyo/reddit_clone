<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DownvoteCommentController extends Controller
{
    public function store(User $user, Comment $comment) {
        $comment->downvote($user);
        return back();
    }
}
