<?php

use Illuminate\Support\Facades\Route;



Route::view('/', 'home')->name('home');
Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');

//Route::get('/second', function () {
//    return view('second');
//});

Route::view('/second', 'second');
