<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/', function() {

    return view('index');
});

Route::get('/contact', function() {
    $posts = Post::all();
    return view('contact', compact('posts'));
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function() {
    Route::resources([
        'users'=> UserController::class,
        'posts'=> PostController::class
    ]);
});
