<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('category',        [CategoryController::class, 'index'])->name('categories.index');
Route::get('category-create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('category-store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('product',        [ProductController::class, 'index'])->name('products.index');
Route::get('product-create', [ProductController::class, 'create'])->name('products.create');
Route::post('product-store', [ProductController::class, 'store'])->name('products.store');


});
