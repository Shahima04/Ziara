<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\ProductController;
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
    return redirect()->route('customer.dashboard');
});

// ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    
    // Products CRUD
    Route::get('/products', [Products::class, 'index'])->name('admin.products');
    Route::get('/products/create', [Products::class, 'create'])->name('admin.products.create');
    Route::post('/products', [Products::class, 'store'])->name('admin.products.store');
    
    // Admin logout
    Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('admin.logout');
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


Route::middleware('auth')->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// Home Page
Route::get('/customer/dashboard', function () {
    return view('customer.home');
})->name('customer.dashboard');

// Products Page (Shop / New Arrivals)
Route::get('/products', function () {
    return view('customer.products');
})->name('products.index');

// Cart Page
Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart.index');

// About Us Page
Route::get('/about', function () {
    return view('customer.about');
})->name('about');

// Contact Page
Route::get('/contact', function () {
    return view('customer.contact');
})->name('contact');

// Gender-Specific Collections
Route::get('/collection/women', function () {
    return view('customer.products');
})->name('collection.women');

Route::get('/collection/men', function () {
    return view('customer.products');
})->name('collection.men');

// Products page
Route::get('/products', [ProductController ::class, 'index'])
    ->name('products.index');

// Product details page
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

//account page
Route::middleware('auth')->get('/account', function () {
    return view('customer.account');
})->name('account');
