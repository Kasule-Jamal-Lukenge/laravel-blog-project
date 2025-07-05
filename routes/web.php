<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RiteshController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;


// Route::get('/', function () {
//     return view('posts.post-list');
// });

route::get('/', [PostController::class, 'showPosts']);

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
route::get('add-post', [PostController::class, 'addPost']);
route::post('add-post', [PostController::class, 'processPost']);
//edit post routes
route::get('edit-post/{id}', [PostController::class, 'fetchPostData']);
route::post('edit-post/{id}', [PostController::class, 'editPost']);
//delete post routes
route::get('delete-post/{id}', [PostController::class, 'deletePost']);
// Route::resource('ritesh', RiteshController::class);

//Comment Routes
route::post('/save-comment', [CommentController::class, 'saveComment']);

//Post Likes Route
Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->middleware('auth')->name('posts.like');
//Comment Like Route
Route::post('/comments/{comment}/like', [CommentController::class, 'toggleLike'])->name('comments.like');
//edit comment routes
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->middleware('can:update,comment');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->middleware('can:update,comment');
//delete comment route
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('can:delete,comment');




