<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Subreddit;
use App\Models\User;
use App\Models\PostUpvotes;
class Post extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function subreddit() {
        return $this->belongsTo(Subreddit::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    // gets the time of creation of the post in a formatted way. stole this code
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

    public function upvotes() {
        return $this->hasMany(PostUpvotes::class);
    }

    public function scopeWithUpvotes(Builder $query) {
        $query->leftJoinSub(
            'SELECT post_id , sum(post_upvotes.upvoted - !post_upvotes.upvoted) as upvotes from post_upvotes GROUP BY post_id',
            'post_upvotes',
            'post_upvotes.post_id',
            'posts.id'
        );
    }

  

    // this returns a whole "karma" row with ids and timestamps and stuff
    // public function karma() {
    //     return $this->hasMany(PostKarma::class);
    // }

    // // this returns only the karma and formats it
    // public function getPurekarmaAttribute() {
    //     $pureKarma = $this->karma->pluck('karma')[0];
    //     if(strlen($pureKarma) > 3) {
    //         return substr($pureKarma, 0, -3) . 'k';
    //     }

    //     return $pureKarma;
    // }

}
