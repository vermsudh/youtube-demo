<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts =[];
    if(auth()->check()){
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
        
    }
    //$posts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
    
});
Route::post('/register', [UserController :: class, 'register']);
Route::post('/login', [UserController :: class, 'login']);
Route::post('/logout', [UserController :: class, 'logout']);


//blog post related routes. 
Route::post('/create-post', [PostController :: class, 'createPost']);
Route::get('/edit-post/{post}', [PostController :: class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController :: class, 'updatePost']);