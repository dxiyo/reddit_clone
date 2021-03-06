<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // gets the time of creation of the comment in a formatted way. stole this code
    // from https://phppot.com/php/php-time-ago-function/#:~:text=PHP%20Custom%20Time%20Ago%20Function&text=In%20timeago()%20function%20the,calculate%20the%20time%20ago%20string.
    public function getCreatedAttribute() {
        $timestamp = strtotime($this->created_at);	
	   
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
                $diff     = time()- $timestamp;
                for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
                }

                $diff = round($diff);
                return $diff . " " . $strTime[$i] . "(s) ago ";
        }
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    // Establishes a polymorphic relationship with the upvote model
    public function upvotes() {
        return $this->morphMany(Upvote::class, 'upvoteable');
    }

    // returns true or false based on if the user upvoted the post or not
    public function isUpvotedBy(User $user) {
        return (bool) $this->upvotes()->where(['user_id' => $user->id, 'upvoted' => true])->count();
    }

    // makes the user upvote
    public function upvote(User $user) {
        // if the user already upvoted, delete upvote record
        if($this->isUpvotedBy($user)) {
            $this->upvotes()->where('user_id', $user->id)->delete($user);
        } else {
            // first checks if the user downvoted the post. if he did, then update record to make it an upvote
            if($this->isDownvotedBy($user)) {
                $this->upvotes()
                    ->where(['user_id' => $user->id])
                    ->update(['upvoted' => true]);
            } else {
                // if the user neither already upvoted or downvoted the post, create a record with an upvote
                $this->upvotes()->create(['user_id' => $user->id, 'upvoted' => true]);
            }
        }
    }

    // checks if the user downvoted the post
    public function isDownvotedBy(User $user) {
        return (bool) $this->upvotes()->where(['user_id' => $user->id, 'upvoted' => false])->count();
    }

    // makes the user downvote the post
    public function downvote(User $user) {
        // if the user already downvoted the post, delete the record of the upvote model relationship
        if($this->isDownvotedBy($user)) {
            $this->upvotes()->where('user_id', $user->id)->delete($user);
        } else {
            // if the user upvoted the post, update the record so that it's a downvote now
            if($this->isUpvotedBy($user)) {
                $this->upvotes()
                    ->where(['user_id' => $user->id])
                    ->update(['upvoted' => false]);
            } else {
                // if the user neither upvoted or downvoted the post, create a new record with a downvote
                $this->upvotes()->create(['user_id' => $user->id, 'upvoted' => false]);
            }
        }
    }

    public function scopeWithUpvotes(Builder $query) {
        $query->leftJoinSub(
            "SELECT upvoteable_id, sum(upvotes.upvoted - !upvotes.upvoted) as upvotes, created_at as upvoted_at from upvotes where upvoteable_type like '%Comment' GROUP BY upvoteable_id",
            'upvotes',
            'upvotes.upvoteable_id',
            'comments.id'
        );
    }

    public function replies() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function repliesWithUpvotes() {
        return $this->replies->map(function($reply) {
            return Comment::withUpvotes()->where(['id' => $reply->id])->get();
        })->flatten();
    }

    public function hasReplies() {
        return (bool) $this->replies->count();
    }

    public function reply(Comment $comment) {
        $this->replies()->save($comment);
    }
    
    
}
