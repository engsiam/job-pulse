<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CandidateCvController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobApplyController;

require __DIR__ . '/auth.php';


// User Dashboard Routes Group
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'candidate', 'as' => 'candidate.'], function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserController::class, 'updatePassword'])->name('profile.update.password');

    Route::get('/candidate_cv', [CandidateCvController::class, 'candidateCV'])->name('job.cv');
    Route::put('/candidate_cv/store', [CandidateCvController::class, 'store'])->name('job.cv-store');

    Route::get('cv-preview', [CandidateCvController::class, 'cvPreview'])->name('cv.preview');

    Route::post('job-apply', [JobApplyController::class, 'jobApply'])->name('job.apply');

    Route::get('show-job-apply', [JobApplyController::class, 'showJobApply'])->name('show-job.apply');

});

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home.page');

// Admin Login Route
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');

// About Page Route
Route::get('/about/page', [HomeController::class, 'aboutPage'])->name('about.page');

// Jobs Page Route
Route::get('/job/page', [HomeController::class, 'jobPage'])->name('job.page');

// Blog Page Route
Route::get('/blog/page', [HomeController::class, 'blogPage'])->name('blog.page');

// Contact Page Route
Route::get('/contact/page', [ContactController::class, 'contactPage'])->name('contact.page');
Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('send.message');

// Candidate google login
Route::get('/login/google', [HomeController::class, 'googleRedirect'])->name('login.google');
Route::get('/login/google/callback', [HomeController::class, 'googleCallback']);


// job list by category
Route::get('job-by-category/{id}', [HomeController::class, 'jobByCategory'])->name('job.category');

// job list by company
Route::get('job-by-company/{id}', [HomeController::class, 'jobByCompany'])->name('job.company');

// company list
Route::get('all-company', [HomeController::class, 'allCompany'])->name('all.company');

// category list
Route::get('all-category', [HomeController::class, 'allCategory'])->name('all.category');

// job search by 
Route::get('search-jobs', [HomeController::class, 'searchJob'])->name('search.job');


