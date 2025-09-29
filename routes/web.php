<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/', [ViewController::class, 'view'])->name('home');
Route::get('/show/{post}', [ViewController::class, 'show'])->name('public.show');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes (protected by admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [PostController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [PostController::class, 'store'])->name('admin.store');
    Route::get('/admin/show/{post}', [PostController::class, 'show'])->name('admin.show');
    Route::get('/admin/edit/{post}', [PostController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{post}', [PostController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{post}', [PostController::class, 'destroy'])->name('admin.destroy');
});
