<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => view('welcome'));

Route::get('/login', [AuthController::class, 'loginView'])->name('login.loginView');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.registerView');
Route::post('/register', [AuthController::class, 'register'])->name('register');