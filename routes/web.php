<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\JobAdvertisementController;
use App\Http\Controllers\JobSeeker\HomeController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('job_seeker.home');
Route::get('job_ads', [HomeController::class, 'jobsAds'])->name('job_seeker.job_ads');
Route::get('company_profile/{company}', [HomeController::class, 'companyProfile'])->name('company_profile');
Route::get('job_details/{id}', [HomeController::class, 'jobDetails'])->name('job_details');

Route::view('packages', 'job_seeker.packages');


Route::prefix('job_seeker')->name('job_seeker.')->group(function () {
    Route::get('register', [JobSeekerController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [JobSeekerController::class, 'register']);
    Route::get('login', [JobSeekerController::class, 'showLoginForm'])->name('login');
    Route::post('login', [JobSeekerController::class, 'login']);
});
Route::prefix('job_seeker')->name('job_seeker.')->middleware('auth:jobseeker')->group(function () {
    // Authenticated routes
    Route::post('logout', [JobSeekerController::class, 'logout'])->name('logout');
    Route::get('profile', [JobSeekerController::class, 'showProfileForm'])->name('profile');
    Route::post('profile', [JobSeekerController::class, 'updateProfile'])->name('profile.update');
    Route::get('change_password', [JobSeekerController::class, 'changePasswordForm'])->name('change_password');
    Route::post('change_password', [JobSeekerController::class, 'changePassword'])->name('change_password.submit');
    Route::get('show_cv', [JobSeekerController::class, 'showCV'])->name('show_cv');
    Route::get('job_alerts', [JobSeekerController::class, 'jobAlertsForm'])->name('job_alerts');
    Route::put('job_alerts', [JobSeekerController::class, 'updateJobAlerts'])->name('job_alerts.update');
    Route::post('add_review', [JobSeekerController::class, 'addReview'])->name('add_review');
    Route::get('my_reviews', [JobSeekerController::class, 'myReviews'])->name('my_reviews');
    Route::delete('delete_review/{review}', [JobSeekerController::class, 'deleteMyReview'])->name('delete_review');

});



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
    Route::resource('job_ads', JobAdvertisementController::class);

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
