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

    // Category-specific create routes
    Route::get('/admin/create/course-overview', [PostController::class, 'createByCategory'])->name('admin.create.course-overview');
    Route::get('/admin/create/interesting-activities', [PostController::class, 'createByCategory'])->name('admin.create.interesting-activities');
    Route::get('/admin/create/teachers', [PostController::class, 'createByCategory'])->name('admin.create.teachers');
    Route::get('/admin/create/student-works', [PostController::class, 'createByCategory'])->name('admin.create.student-works');
    Route::get('/admin/create/outstanding-alumni', [PostController::class, 'createByCategory'])->name('admin.create.outstanding-alumni');

    Route::post('/admin/store', [PostController::class, 'store'])->name('admin.store');
    Route::get('/admin/show/{post}', [PostController::class, 'show'])->name('admin.show');

    // Category-specific edit routes
    Route::get('/admin/edit/{post}/course-overview', [PostController::class, 'editByCategory'])->name('admin.edit.course-overview');
    Route::get('/admin/edit/{post}/interesting-activities', [PostController::class, 'editByCategory'])->name('admin.edit.interesting-activities');
    Route::get('/admin/edit/{post}/teachers', [PostController::class, 'editByCategory'])->name('admin.edit.teachers');
    Route::get('/admin/edit/{post}/student-works', [PostController::class, 'editByCategory'])->name('admin.edit.student-works');
    Route::get('/admin/edit/{post}/outstanding-alumni', [PostController::class, 'editByCategory'])->name('admin.edit.outstanding-alumni');

    Route::put('/admin/update/{post}', [PostController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{post}', [PostController::class, 'destroy'])->name('admin.destroy');
});
