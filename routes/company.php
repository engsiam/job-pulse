<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\CompanyJobAppyController;
use App\Http\Controllers\Backend\JobsController;
use Illuminate\Support\Facades\Route;

// company dashboard
Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');

// company profile
Route::get('/profile', [CompanyController::class, 'index'])->name('profile');
Route::put('profile', [CompanyController::class, 'updateProfile'])->name('profile.update');
Route::post('profile', [CompanyController::class, 'updatePassword'])->name('profile.update.password');

// Create job post
Route::put('job-change-status', [JobsController::class, 'changeStatus'])->name('job.change-status');
Route::resource('jobs', JobsController::class);

// Plugin
Route::get('plugin', [AdminController::class, 'plugin'])->name('plugin.index');

// Candidate Job Apply
Route::get('job-apply-company', [CompanyJobAppyController::class, 'jobApplyCompany'])->name('job-apply-company');
Route::get('candidate-cv/{id}', [CompanyJobAppyController::class, 'viewCV'])->name('candidate.cv');

// application approve
Route::post('job-apply-approve/{id}', [CompanyJobAppyController::class, 'jobApplyApprove'])->name('job-apply-approve');

// application reject
Route::post('job-apply-reject/{id}', [CompanyJobAppyController::class, 'jobApplyReject'])->name('job-apply-reject');