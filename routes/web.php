<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminDashboard;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Products;

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

Route::middleware(['auth:sanctum', 'verified', 'admin'])
    ->get('/admin/products', Products::class)
    ->name('admin.products');



// Home Page
Route::get('/customer/dashboard', function () {
    return view('customer.home');
})->name('customer.dashboard');

// Products Page (Shop / New Arrivals)
Route::get('/products', function () {
    return view('customer.products');
})->name('products.index'); // <-- used in navbar links

// Cart Page
Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart.index'); // <-- matches navbar

// About Us Page
Route::get('/about', function () {
    return view('customer.about');
})->name('about'); // <-- navbar link

// Contact Page
Route::get('/contact', function () {
    return view('customer.contact');
})->name('contact'); // <-- navbar link

// Gender-Specific Collections
Route::get('/collection/women', function () {
    return view('customer.products');
})->name('collection.women'); // <-- navbar link for WOMEN

Route::get('/collection/men', function () {
    return view('customer.products');
})->name('collection.men'); // <-- navbar link for MEN
