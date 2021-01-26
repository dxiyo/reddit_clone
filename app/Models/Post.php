<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subreddit;
use App\Models\User;
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
}
