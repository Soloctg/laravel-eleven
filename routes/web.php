<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



//Route::view('/', 'home')->name('home');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('posts/{postId}', [PostController::class, 'some_method']);
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');

//Route::get('/second', function () {
//    return view('second');
//});

Route::view('/second', 'second');
