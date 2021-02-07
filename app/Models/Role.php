<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ability;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function abilities() {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function allowTo(Ability $ability) {
        $this->abilities()->sync($ability, false);
    }
}
