<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/Shop', [AdminController::class, 'shop'])->name('Shop');
Route::get('/products/select/{id}', [ProductController::class, 'select'])->name('Products.select');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Product routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('Products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('Products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('Products.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('Products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('Products.destroy');

    // user
    Route::get('admin/user', [UserController::class, 'user'])->name('users.user');
    Route::get('admin/user/edit{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('admin/user/update{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
require __DIR__ . '/auth.php';
