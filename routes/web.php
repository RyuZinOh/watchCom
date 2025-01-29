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




//logout
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');