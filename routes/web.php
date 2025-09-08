<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;

// Public routes
Route::get('/', [ViewController::class, 'view'])->name('home');
Route::get('/show/{post}', [ViewController::class, 'show'])->name('public.show');

// Admin routes
Route::get('/admin', [PostController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [PostController::class, 'store'])->name('admin.store');
Route::get('/admin/show/{post}', [PostController::class, 'show'])->name('admin.show');
Route::get('/admin/edit/{post}', [PostController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{post}', [PostController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{post}', [PostController::class, 'destroy'])->name('admin.destroy');
