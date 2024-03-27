<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('lists/categories', [\App\Http\Controllers\Api\CategoryController::class, 'list']);
//Route::get('categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
//Route::get('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'show']);
//Route::put('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'update']);
//Route::delete('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'destroy']);
//Route::post('categories', [\App\Http\Controllers\Api\CategoryController::class, 'store']);

//Route::resource('categories', \App\Http\Controllers\Api\CategoryController::class);
//Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);

//Route::get('products', [\App\Http\Controllers\Api\ProductController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class)
        ->middleware('auth:api');
        //->middleware('auth:sanctum');

    Route::get('products', [\App\Http\Controllers\Api\ProductController::class, 'index']);
});
