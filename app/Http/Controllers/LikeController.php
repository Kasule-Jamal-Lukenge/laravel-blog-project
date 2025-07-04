<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function toggle(Request $request, Post $post){
        $user = auth()->user();

        if($post->isLikedBy($user)){
            //unlike
            $post->likes()->where('user_id', $user->id)->delete();
        }else{
            //like
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back();
    }
}
