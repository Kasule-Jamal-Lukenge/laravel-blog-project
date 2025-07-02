<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RiteshController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [LoginController::class, 'adminIndex'])->middleware(['auth', 'admin']);

//view post routes
route::get('posts', [PostController::class, 'showPosts']);
route::get('admin-posts-list', [PostController::class, 'adminPosts']);
route::get('read-post/{id}', [PostController::class, 'readPost']);
//create post routes
route::get('create-post', [PostController::class, 'addPost']);
route::post('add-post', [PostController::class, 'processPost']);
//edit post routes
route::get('edit-post/{id}', [PostController::class, 'fetchPostData']);
route::post('edit-post/{id}', [PostController::class, 'editPost']);
//delete post routes
route::delete('delete-post/{id}', [PostController::class, 'deletePost']);
// Route::resource('ritesh', RiteshController::class);


