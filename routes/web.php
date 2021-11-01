<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => view('welcome'));

Route::get('/login', [AuthController::class, 'loginView'])->name('login.loginView');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.registerView');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // PRODUCTS
    Route::prefix('/products')->name('products.')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::put('/{productId}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{productId}', [ProductController::class, 'destroy'])->name('destroy');
    });


    // TRANSACTIONS
    // Route::prefix('/transactions')->name('transactions.')->group(function() {
    //     Route::get('/', []);
    // });
});