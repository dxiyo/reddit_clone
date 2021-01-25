<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Subreddit extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'name';
    public $incrementing = false;


    public function posts() {
        return $this->hasMany(Post::class);
    }



}
