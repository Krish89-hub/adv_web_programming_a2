<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::controller(PostsController::class)->middleware("auth:sanctum")->prefix("posts")->group(function(){
    Route::get('', 'getAll');
    Route::get('{id}', 'getSinglePost');
    Route::post('create', 'store');
})->middleware('auth:sanctum');
