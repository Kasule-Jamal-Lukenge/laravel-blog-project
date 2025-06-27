<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showPosts(){
        return view('posts.posts-list');
    }

    public function addPost(){
        return view('posts.add-post');
    }
}
