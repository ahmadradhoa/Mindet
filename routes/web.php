<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController; // <-- 1. TAMBAHKAN IMPORT INI DI ATAS
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke beranda postingan
Route::get('/', fn () => redirect()->route('posts.index'));

// Route dashboard (untuk kompatibilitas dengan Laravel Breeze)
Route::get('/dashboard', fn () => redirect()->route('posts.index'))->name('dashboard');

// Grup rute yang WAJIB LOGIN
Route::middleware(['auth'])->group(function () {
    
    // CRUD Kategori
    Route::resource('categories', CategoryController::class);
    
    // CRUD Postingan
    Route::resource('posts', PostController::class);

    // Rute Khusus Komentar (Bonus)
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // 2. TAMBAHKAN ROUTE PROFIL DI SINI (Di dalam grup auth)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

// File ini WAJIB ada untuk mengaktifkan Login/Register bawaan Breeze
require __DIR__.'/auth.php';