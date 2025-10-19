<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Auth
// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/register/store', [AuthController::class, 'insertUser'])->name('insertUser');
Route::get('/register/coba', function () {
    return view('auth.coba');
})->name('coba');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Home
Route::get('/', [HomeController::class, 'index']);
