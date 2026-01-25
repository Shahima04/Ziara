<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminDashboard;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Auth;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// DEFAULT DASHBOARD - Role-based redirection
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {
    $user = Auth::user();
    
    // Redirect based on user_type
    if ($user->user_type === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return redirect()->route('user.dashboard');
})->name('dashboard');

// ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    
    // Products CRUD
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    
    // Admin logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});

// CUSTOMER/USER ROUTES
Route::middleware(['auth:sanctum', 'verified', 'customer'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});