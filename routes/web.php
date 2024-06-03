<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/', function() {

    return view('home');
})->name('/');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::resources([
    'users'=> UserController::class,
    'posts'=> PostController::class
]);
