<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/', function() {

    return view('home');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::resources([
    'users'=> UserController::class,
    'posts'=> PostController::class
]);
