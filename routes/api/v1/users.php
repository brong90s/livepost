<?php

use Illuminate\Support\Facades\Route;


// Route::apiResource('users', \App\Http\Controllers\UserController::class);

Route::middleware(['auth'])
  ->prefix('heyya')
  ->name('users.')
  ->namespace('\App\Http\Controllers')
  ->group(function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('index')->withoutMiddleware('auth');
    Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('show')->withoutMiddleware('auth')->whereNumber('user');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::patch('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('delete');
  });
