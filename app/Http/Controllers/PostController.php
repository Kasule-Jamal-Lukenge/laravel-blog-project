<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showPosts(){
        $postData = Post::all(); 
        return view('posts.posts-list', compact('postData'));
    }

    public function addPost(){
        return view('posts.add-post');
    }

    public function processPost(Request $request){
        $postData = new Post;
        $postData->title = $request->title;
        $postData->description = $request->description;
        $postData->image = $request->image;
        //getting the image from the form data
        $postImage = $request->image;
        if($postImage){
            $imagename = time().'.'.$postImage->getClientOriginalExtension();
            //storing or moving the image to the posts folder in the public folder
            $request->image->move('postImages', $imagename);
            $postData->image = $imagename;
        }
        //saving the data
        $postData->save();
        //redirecting to other page
        return redirect('posts-list');
    }
}
