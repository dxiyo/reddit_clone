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
}
