<?php

use Illuminate\Support\Facades\Route;


// Route::apiResource('users', \App\Http\Controllers\UserController::class);

Route::middleware(['auth'])
  ->name('posts.')
  ->namespace('\App\Http\Controllers')
  ->group(function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])
      ->name('index')
      ->withoutMiddleware('auth');
    Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])
      ->name('show')
      ->withoutMiddleware('auth')
      ->whereNumber('post');
    Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])
      ->name('store')
      ->withoutMiddleware('auth');
    Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])
      ->name('update')
      ->withoutMiddleware('auth');
    Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])
      ->name('delete')
      ->withoutMiddleware('auth');
  });
