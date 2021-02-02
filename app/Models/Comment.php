<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    // Establishes a polymorphic relationship with the upvote model
    public function upvotes() {
        return $this->morphMany(Upvote::class, 'upvoteable');
    }
    
}
