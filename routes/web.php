<?php

use Illuminate\Support\Facades\Route;
use RenderLabs\Renegade\Http\Renegade\PostController;
use RenderLabs\Renegade\Http\Renegade\DashboardController;

Route::get('/dasboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post:slug}', [PostController::class, 'delete'])->name('posts.delete');
