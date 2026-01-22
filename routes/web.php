<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

Route::get('/products', [ProductController::class,'index'])->name('admin.products');
Route::get('/products/create', [ProductController::class,'create'])->name('admin.products.create');
Route::post('/products', [ProductController::class,'store'])->name('admin.products.store');
});


Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');
