<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Auth
// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register/store', [AuthController::class, 'insertUser'])->name('insertUser');
Route::get('/register/coba', function () {
    return view('auth.coba');
})->name('coba');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login/validate', [AuthController::class, 'validateUser'])->name('validateUser');

// Home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::post('/home/postStore', [HomeController::class, 'postStore'])->middleware('auth')->name('postStore');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');