<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
});
Route::post('/register', [UserController :: class, 'register']);
Route::post('/login', [UserController :: class, 'login']);
Route::post('/logout', [UserController :: class, 'logout']);


//blog post related routes. 
Route::post('/create-post', [PostController :: class, 'createPost']);