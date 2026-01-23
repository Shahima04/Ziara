<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminDashboard;
use App\Livewire\UserDashboard;
use App\Livewire\Login;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Jetstream default dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Unified login (Livewire)
Route::get('/login', Login::class)->name('login')->middleware('guest');

// Admin dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');

    // Products CRUD
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');

    // Admin logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});

// User dashboard
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
