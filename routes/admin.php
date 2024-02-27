<?php

use App\Http\Controllers\Backend\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AllCompanyController;
use App\Http\Controllers\Backend\JobApplyController;
use App\Http\Controllers\Backend\JobRequestController;


// Admin  dashboard
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// admin profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// Banner Routes
Route::put('slider-change-status', [SliderController::class, 'changeStatus'])->name('slider.change-status');
Route::resource('slider', SliderController::class);

// Silder Routes
Route::put('category-change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// All Company
Route::put('company-change-status', [AllCompanyController::class, 'changeStatus'])->name('company.change-status');
Route::resource('company', AllCompanyController::class);

// Job Request from company
Route::put('job-request-change-status', [JobRequestController::class, 'changeStatus'])->name('job-request.change-status');
Route::get('company-job-request', [JobRequestController::class, 'index'])->name('company.job-request');
Route::get('company-job-request-edit/{id}', [JobRequestController::class, 'edit'])->name('company.job-request-edit');
Route::post('company-job-request-update/{id}', [JobRequestController::class, 'update'])->name('company.job-request-update');
Route::delete('company-job-request-delete/{id}', [JobRequestController::class, 'delete'])->name('company.job-request-delete');

// Blog Routes
Route::put('blog-change-status', [BlogController::class, 'changeStatus'])->name('blog.change-status');
Route::resource('blog', BlogController::class);

// About Routes
Route::get('about-us', [AboutController::class, 'index'])->name('about-us.index');
Route::put('about-us', [AboutController::class, 'store'])->name('about-us.store');

// about us image
Route::post('about-us-image', [AboutController::class, 'imageUpload'])->name('about.image');
Route::delete('about-us-image-delete/{id}', [AboutController::class, 'imageDelete'])->name('about.image-delete');

// candidate job apply list
Route::get('job-apply', [JobApplyController::class, 'jobApply'])->name('job-apply');