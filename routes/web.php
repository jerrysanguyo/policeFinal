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
    SpecialTrainingController,
    BmiController,
    PhysicalController,
    ReportController,
};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
Route::get('/admin-trainings/{courseId}', [SpecialTrainingController::class, 'getAdminTrainings'])->name('admin.trainings');
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
    Route::resource('training', SpecialTrainingController::class);
    Route::resource('bmi', BmiController::class);
    Route::resource('physical', PhysicalController::class);
    // course & course Extension
    Route::resource('course', CourseController::class);
    Route::get('/course-extension/{courseExn}', [CourseController::class, 'courseExnUpdate'])
        ->name('courseExn.update');
    // information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
    //physical picture & Pft result
    Route::put('/physical/updatePic/{physicalPic}', [PhysicalController::class, 'updatePicture'])
        ->name('physical.updatePic');
    Route::put('physical/updatePft/{physicalPft}', [PhysicalController::class, 'updatePftResult'])
        ->name('physical.updatePft');
    //charts
    Route::get('/users-per-program-chart', [ReportController::class, 'showUsersPerProgramChart'])
        ->name('report.programChart');
});

// admin middleware
Route::middleware(['auth', 'check.user.role'])->prefix('admin')->name('admin.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // resource
    Route::resource('account', AccountController::class);
    Route::resource('rank', RankController::class);
    Route::resource('office', OfficeController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('special', SpecialCourseController::class);
    Route::resource('specialExtn', SpecialCourseExtnController::class);
    Route::resource('training', SpecialTrainingController::class);
    Route::resource('bmi', BmiController::class);
    Route::resource('physical', PhysicalController::class);
    // Information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
    // course & course Extension
    Route::resource('course', CourseController::class);
    Route::get('/course-extension/{courseExn}', [CourseController::class, 'courseExnUpdate'])
        ->name('courseExn.update');
    // information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
    //physical picture & Pft result
    Route::put('/physical/updatePic/{physicalPic}', [PhysicalController::class, 'updatePicture'])
    ->name('physical.updatePic');
    Route::put('physical/updatePft/{physicalPft}', [PhysicalController::class, 'updatePftResult'])
        ->name('physical.updatePft');
    //charts
    Route::get('/users-per-program-chart', [ReportController::class, 'showUsersPerProgramChart']);
});

// user middleware
Route::middleware(['auth', 'check.user.role'])->prefix('user')->name('user.')->group(function() 
{
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard'); 
    // course & course Extension
    Route::resource('course', CourseController::class);
    Route::resource('physical', PhysicalController::class);
    Route::get('/course-extension/{courseExn}', [CourseController::class, 'courseExnUpdate'])
        ->name('courseExn.update');
    // information
    Route::post('/information/storeOrUpdate', [InformationController::class, 'storeOrUpdate'])
        ->name('information.storeOrUpdate');
    //training
    // Route::post('training/storeOrUpdate', [SpecialTrainingController::class, 'storeOrUpdate'])
    //     ->name('training.storeOrUpdate');
    //physical picture & Pft result
    Route::put('/physical/updatePic/{physicalPic}', [PhysicalController::class, 'updatePicture'])
        ->name('physical.updatePic');
    Route::put('physical/updatePft/{physicalPft}', [PhysicalController::class, 'updatePftResult'])
        ->name('physical.updatePft');
});