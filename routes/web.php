<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function() {

    $users = User::all();

    return view('home', compact('users'));
})->name('/');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');
