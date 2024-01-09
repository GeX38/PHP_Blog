<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Http\Kernel;


Route::get('/', [PostController::class, 'indexPub'])->name('posts.home');
Route::get('/posts', [PostController::class, 'indexAll'])->name('posts.index');


Route::resource('posts', PostController::class);

Route::post('/posts/{id}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::post('/posts/{id}/unpublish', [PostController::class, 'unpublish'])->name('posts.unpublish');

Route::put('/posts/{id}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::put('/posts/{id}/unpublish', [PostController::class, 'unpublish'])->name('posts.unpublish');