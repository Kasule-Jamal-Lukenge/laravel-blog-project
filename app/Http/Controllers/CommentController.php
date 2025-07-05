<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function saveComment(Request $request){
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->back()->with('success', 'Comment Added Successfully');
    }

    public function fetchComments($postId){
        $comments = Model::find($postId);
        return view('posts.read-post', 'comments');
    }

    public function toggleLike(Comment $comment){
        $user = auth()->user();

        if ($comment->isLikedBy($user)) {
            //unlike
            $comment->likes()->where('user_id', $user->id)->delete();
        } else {
            //like
            $comment->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }

}
