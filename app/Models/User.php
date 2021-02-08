<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\ImagePost;
use App\Models\Subreddit;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getAvatarAttribute() {
        return 'https://i.pravatar.cc/150?u=' . $this->email;
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function image_posts() {
        return $this->hasMany(ImagePost::class);
    }

    // WITHOUT THE UPVOTES. USING CONTAINS ON THIS WILL WORK WITH A NORMAL POST OR IMAGE POST THAT DOESNT HAVE THE 'WITHUPVOTES' SCOPE
    public function allPosts() {
        return $this->posts->merge($this->image_posts);
    }

    public function subreddits_owned() {
        return $this->hasMany(Subreddit::class);
    }

    public function subscribed() {
        return $this->belongsToMany(Subreddit::class)->withTimestamps();
        
    }
    
    public function subscribe(Subreddit $subreddit) {
        if(!$this->is_subscribed($subreddit)) {
            $this->subscribed()->save($subreddit);
        } else {
            $this->subscribed()->detach($subreddit); // if the user is already subscribed, unsubscibe
        }
    }

    public function is_subscribed(Subreddit $subreddit) {
        return  count($this->subscribed()->where(['name' => $subreddit->name])->get()) > 0;
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole(Role $role) {
        $this->roles()->sync($role, false); // if i use save(), it will return an error when assigning the same role to the same user. this will just update the record. false means that nothing will be dropped. 
    }

    public function abilities() {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }
}
