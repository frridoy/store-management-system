<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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


Route::get('/employee-register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/employee-register-store', [RegisterController::class, 'register'])->name('register.store');


Route::get('/branch-create', [BranchController::class, 'create'])->name('branches.create');
Route::post('/branch-store', [BranchController::class, 'store'])->name('branches.store');


});
