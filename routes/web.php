<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\RegisterController,
    HomeController,
    AccountController,
    RankController,
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/registration', [RegisterController::class, 'index'])->name('registration');

// superadmin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('superadmin')->name('superadmin.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // resource
    Route::resource('account', AccountController::class);
    Route::resource('rank', RankController::class);
});

// admin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('admin')->name('admin.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// user middleware
Route::middleware(['auth', 'check.user.role'])->prefix('user')->name('user.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard'); 
});