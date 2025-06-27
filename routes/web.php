<?php

use Illuminate\Support\Facades\Route;

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
