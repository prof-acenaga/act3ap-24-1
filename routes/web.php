<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function() {


    return view('home');
})->name('/');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');
