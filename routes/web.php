<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\RegisterController,
    HomeController,
    AccountController,
    RankController,
    OfficeController,
    InformationController,
    ProgramController,
    CourseController,
    SpecialCourseController,
    SpecialCourseExtnController,
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
Route::get('get-special-extension/{specialId}', [SpecialTrainingController::class, 'getSpecialExn'])->name('special.exntension');
// superadmin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('superadmin')->name('superadmin.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])
        ->name('dashboard');
    // resource
    Route::resource('account', AccountController::class);
    Route::resource('rank', RankController::class);
    Route::resource('office', OfficeController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('special', SpecialCourseController::class);
    Route::resource('specialExtn', SpecialCourseExtnController::class);
    // course & course Extension
    Route::resource('course', CourseController::class);
    Route::get('/course-extension/{courseExn}', [CourseController::class, 'courseExnUpdate'])
        ->name('courseExn.update');
    // information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
});

// admin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('admin')->name('admin.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // Information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
    // Course
    Route::resource('course', CourseController::class);
});

// user middleware
Route::middleware(['auth', 'check.user.role'])->prefix('user')->name('user.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard'); 
    // Information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
});