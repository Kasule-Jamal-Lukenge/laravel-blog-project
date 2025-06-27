<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

//users routes
Route::get('/add-user', function(){
    return view('users.add-user');
});
Route::get('/users-list', function(){
    return view('users.users-list');
});

//posts routes
route::get('/posts-list', [PostController::class, 'showPosts']);
route::get('/add-post', [PostController::class, 'addPost']);
