<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('states', StateController::class);
    Route::resource('centers', CenterController::class);
    Route::resource('beneficiaries', BeneficiaryController::class);
    Route::resource('counselling_sessions', \App\Http\Controllers\CounsellingSessionController::class);
    Route::resource('treatments', \App\Http\Controllers\TreatmentController::class);
    Route::resource('follow_ups', \App\Http\Controllers\FollowUpController::class);
});

require __DIR__.'/auth.php';