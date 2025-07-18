<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillabe = [
        'title',
        'description',
        'image'
    ];

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLikedBy($user){
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
