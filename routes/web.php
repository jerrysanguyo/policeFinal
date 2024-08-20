<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    Auth\RegisterController,
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/registration', [RegisterController::class, 'index'])->name('registration');

// superadmin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('superadmin')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('superadmin.dashboard');
});

// admin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('admin')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

// user middleware
Route::middleware(['auth', 'check.user.role'])->prefix('user')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user.dashboard'); 
});