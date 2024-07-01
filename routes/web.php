<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function (){

});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');
    // Add other admin routes here
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
