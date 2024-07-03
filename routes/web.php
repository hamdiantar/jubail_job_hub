<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PackageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\CompanyController;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('company_register', 'job_seeker.company_register');
Route::view('packages', 'job_seeker.packages');





Route::prefix('company')->name('company.')->group(function () {
    Route::get('register', [CompanyController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [CompanyController::class, 'register']);
    Route::get('login', [CompanyController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CompanyController::class, 'login']);

});
Route::prefix('company')->name('company.')->middleware('auth:company')->group(function () {
    // Authenticated routes
    Route::post('logout', [CompanyController::class, 'logout'])->name('logout');
    Route::get('profile', [CompanyController::class, 'showProfileForm'])->name('profile');
    Route::post('profile', [CompanyController::class, 'updateProfile']);
    Route::get('dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
});



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');
});
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Authenticated routes
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('account', [AdminController::class, 'viewAccount'])->name('account.view');
    Route::get('account/edit', [AdminController::class, 'editAccount'])->name('account.edit');
    Route::post('account/update', [AdminController::class, 'updateAccount'])->name('account.update');
    Route::resource('managers', ManagerController::class);
    Route::resource('job_categories', JobCategoryController::class);
    Route::resource('packages', PackageController::class);
});
