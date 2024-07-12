<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Company\ApplicationController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\JobAdvertisementController;
use App\Http\Controllers\Admin\JobAdvertisementController as AdminJobAdvertisementController;
use App\Http\Controllers\Company\PaymentController;
use App\Http\Controllers\Company\ReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Company\SubscriptionController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;
use App\Http\Controllers\JobSeeker\HomeController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\Admin\JobSeekerController as AdminJobSeekerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('job_seeker.home');
Route::view('about_us', 'job_seeker.about_us')->name('about_us');
Route::view('have_company', 'job_seeker.have_company')->name('have_company');
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
    Route::get('my_applications', [JobSeekerController::class, 'myApplications'])->name('my_applications');
    Route::delete('delete-application/{id}', [JobSeekerController::class, 'deleteApplication'])->name('delete_application');
    Route::delete('delete_review/{review}', [JobSeekerController::class, 'deleteMyReview'])->name('delete_review');
    Route::post('apply/{if}', [JobSeekerController::class, 'apply'])->name('apply');
    Route::get('track_application', [JobSeekerController::class, 'trackApplication'])->name('track_application');

    Route::put('job_alerts/{id}/read', [JobSeekerController::class, 'markAsRead'])->name('job_alerts.read');
    Route::delete('job_alerts/{id}', [JobSeekerController::class, 'destroy'])->name('job_alerts.destroy');
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
    Route::resource('reviews', ReviewController::class);
    Route::resource('job_ads', JobAdvertisementController::class);
    Route::resource('applications', ApplicationController::class);
    Route::patch('applications/{id}/update-status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    Route::get('my_subscription', [SubscriptionController::class, 'getMySubscriptions'])->name('my_subscription');
    Route::get('subscription', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::post('payment', [SubscriptionController::class, 'payment'])->name('subscription.payment');
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

    Route::resource('companies', App\Http\Controllers\Admin\CompanyController::class);
    Route::post('companies/{company}/block', [App\Http\Controllers\Admin\CompanyController::class, 'block'])->name('companies.block');
    Route::post('companies/{company}/unblock', [App\Http\Controllers\Admin\CompanyController::class, 'unblock'])->name('companies.unblock');
    Route::post('companies/{company}/accept', [App\Http\Controllers\Admin\CompanyController::class, 'accept'])->name('companies.accept');
    Route::post('companies/{company}/reject', [App\Http\Controllers\Admin\CompanyController::class, 'reject'])->name('companies.reject');


    Route::get('subscriptions', [AdminSubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('subscriptions/{id}', [AdminSubscriptionController::class, 'show'])->name('subscriptions.show');

    Route::get('job_ads', [AdminJobAdvertisementController::class, 'index'])->name('job_ads.index');
    Route::post('job_ads/{id}/accept', [AdminJobAdvertisementController::class, 'accept'])->name('job_ads.accept');
    Route::post('job_ads/{id}/reject', [AdminJobAdvertisementController::class, 'reject'])->name('job_ads.reject');


    Route::get('job_seekers', [AdminJobSeekerController::class, 'index'])->name('job_seekers.index');
    Route::post('job_seekers/{id}/block', [AdminJobSeekerController::class, 'block'])->name('job_seekers.block');
    Route::post('job_seekers/{id}/unblock', [AdminJobSeekerController::class, 'unblock'])->name('job_seekers.unblock');
    Route::get('job_seekers/{id}', [AdminJobSeekerController::class, 'show'])->name('job_seekers.show');

    Route::delete('reviews/{id}/delete', [AdminJobSeekerController::class, 'deleteReview'])->name('reviews.delete');

    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');


    Route::get('reports/companies', [ReportController::class, 'companiesReport'])->name('reports.companies');
    Route::get('reports/jobAdvertisements', [ReportController::class, 'jobAdvertisementsReport'])->name('reports.jobAdvertisements');
    Route::get('reports/jobSeekers', [ReportController::class, 'jobSeekersReport'])->name('reports.jobSeekers');
    Route::get('reports/applications', [ReportController::class, 'applicationsReport'])->name('reports.applications');
    Route::get('reports/reviews', [ReportController::class, 'reviewsReport'])->name('reports.reviews');

});
