<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//return all the products
//Route::get('/products', [App\Http\Controllers\ProductController::class,'index']);
//
//Route::post('/products', [App\Http\Controllers\ProductController::class,'store']);
//
//Route::get('/products/{id}',[App\Http\Controllers\ProductController::class,'show']);

//Route::resource('products',App\Http\Controllers\ProductController::class);

//Public routes
Route::post('/register', [App\Http\Controllers\AuthController::class,'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class,'login']);
Route::get('/products', [App\Http\Controllers\ProductController::class,'index']);
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class,'show']);
Route::get('/products/search/{name}', [App\Http\Controllers\ProductController::class,'search']);

//Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {

    Route::post('/products', [App\Http\Controllers\ProductController::class,'store']);
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class,'update']);
    Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class,'destroy']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class,'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
