<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductsManager;

Route::get('/', [ProductsManager::class, 'index'])->name('home');
//detailed product
Route::get('product/{slug}', [ProductsManager::class, 'details'])->name('product.details');

// Authentication Routes
Route::get('login', [AuthManager::class, 'login'])->name('login'); 
Route::post('login', [AuthManager::class, 'loginPost'])->name('login.post');  

// Registration Routes
Route::get('register', [AuthManager::class, 'register'])->name('register');  
Route::post('register', [AuthManager::class, 'registerPost'])->name('register.post');  

Route::middleware("auth")->group(function () {
    Route::get('cart/{id}', [ProductsManager::class, 'addtoCart'])->name('cart.add');
    Route::get('cart', [ProductsManager::class, 'showCart'])->name('cart.show');
    Route::post('cart/{id}/update', [ProductsManager::class, 'updateCartQuantity'])->name('cart.update');
    Route::get('cart/{id}/remove', [ProductsManager::class, 'removeCartItem'])->name('cart.remove');
    
});

//logout
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');