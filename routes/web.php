<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/', function() {

    return view('index');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/blog', function() {
    $posts = Post::all();
    return view('blog', compact('posts'));
});

Route::get('/products', function() {
    $products = Product::all();
    return view('products', compact('products'));
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function() {
    Route::resources([
        'users'=> UserController::class,
        'posts'=> PostController::class
    ]);
    Route::get('product/add/{product}', [OrderController::class, 'addProduct'])->name('product.add');
    Route::get('product/remove/{product}', [OrderController::class, 'removeProduct'])->name('product.remove');
    Route::get('checkout', [OrderController::class, 'showCart'])->name('checkout');
});
