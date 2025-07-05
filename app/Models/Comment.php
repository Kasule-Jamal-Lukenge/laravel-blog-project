<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class);
    }

    public function parent(){
        return $this->belongsTo(Comment::class);
    }

    public function likes(){
        return $this->hasMany(CommentLike::class);
    }

    public function isLikedBy($userId){
        return $this->likes()->where('user_id', $userId)->exists();
    }

}
