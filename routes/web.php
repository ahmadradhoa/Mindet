<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'));

Route::get('/dashboard', fn () => redirect()->route('posts.index'))->name('dashboard');

Route::middleware(['auth'])->group(function () {
    
    Route::resource('categories', CategoryController::class);
    
    Route::resource('posts', PostController::class);

    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

require __DIR__.'/auth.php';