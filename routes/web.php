<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(AdminMiddleware::class);
Route::prefix('users')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');         // List users
    Route::get('create', [UserController::class, 'create'])->name('users.create');   // Show create form
    Route::post('/', [UserController::class, 'store'])->name('users.store');         // Store user
    Route::get('{user}', [UserController::class, 'show'])->name('users.show');        // Show user
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('users.edit');   // Show edit form
    Route::put('{user}', [UserController::class, 'update'])->name('users.update');    // Update user
    Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user
})->middleware(AdminMiddleware::class);

// Post CRUD Routes
Route::prefix('posts')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');         // List posts
    Route::get('create', [PostController::class, 'create'])->name('posts.create');   // Show create form
    Route::post('/', [PostController::class, 'store'])->name('posts.store');         // Store post
    Route::get('{post}', [PostController::class, 'show'])->name('posts.show');        // Show post
    Route::get('{post}/edit', [PostController::class, 'edit'])->name('posts.edit');   // Show edit form
    Route::put('{post}', [PostController::class, 'update'])->name('posts.update');    // Update post
    Route::delete('{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // Delete post
});
