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

     public function adminPosts(){
        $postData = Post::all(); 
        return view('posts.admin-post-list', compact('postData'));
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
        return redirect('posts');
    }

    public function fetchPostData($id){
        $currentPostData = Post::find($id);
        return view('posts.edit-post', compact('currentPostData'));
    }

    public function editPost(Request $request, $id){
        
        $updatedPost = Post::find($id);
        $updatedPost->title = $request->title;
        $updatedPost->description = $request->description;
        $updatedPostImage = $request->image;

        if($updatedPostImage){
            $imagename = time().'.'.$updatedPostImage->getClientOriginalExtension();
            $request->image->move('postImages', $imagename);
            $updatedPost->image = $imagename;
        }
        //saving the changes
        $updatedPost->save();
        //redirecting to the admin posts list page
        return redirect('admin-posts-list');
    }

    public function deletePost($id){
        $postToDelete = Post::find($id);
        $postToDelete->delete();
        return redirect('admin-posts-list');
    }

    public function readPost($id){
        $postToRead = Post::find($id);
        return view('posts.read-post', compact('postToRead'));
    }
}
