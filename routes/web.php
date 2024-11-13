<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Publicly accessible posts route
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Home page
Route::view('/', 'posts.index')->name('home');

// Registration routes
Route::view('/register', 'auth.register')->name('register');
Route::post('register', [AuthController::class, 'register']);

// Login routes
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']); // Ensure this is POST for login

// User Dashboard (requires authentication)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard (requires authentication and admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // User Update and Delete Routes
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update'); // Update user
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy'); // Delete user
});
