<?php

use App\Http\Controllers\TCGDexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

// Publicly accessible posts route
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Home page
Route::view('/', 'posts.index')->name('home');

// Registration routes
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Google OAuth Routes
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

// User Dashboard (requires authentication)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Display cards from a specific set (requires authentication)
Route::get('/cards/{setCode}', [TCGDexController::class, 'showCardsFromSet'])->name('cards.set')->middleware('auth');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard (requires authentication and admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});
