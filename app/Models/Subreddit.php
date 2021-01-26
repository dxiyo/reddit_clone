<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;
class Subreddit extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'name'; // change the primary key
    public $incrementing = false; // lets laravel understand that the primary key isn't an incrementing integer


    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id'); // laravel assumes the name of the column in the database is "function name " + "_id". and it's 'user_id' not 'owner_id' 
    }

    // gets the time of creation of the subreddit in a formatted way
    public function getCreatedAttribute() {
        $time = date_timestamp_get($this->created_at);
        return date("M d, Y", $time);
    }

    public function getLogoAttribute() {
        return 'https://i.pravatar.cc/150?u=' . $this->name;
    }

}
