<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientInformationController;
use App\Http\Controllers\PatientPortalController;
use App\Http\Controllers\ServiceController;
use App\Support\PracticePolicyCatalog;
use App\Support\TestimonialCatalog;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', [
    'testimonials' => TestimonialCatalog::all(),
])->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/services', 'services')->name('services.index');

Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->where('service', '[a-z0-9-]+')
    ->name('services.show');

Route::view('/telepsychiatry', 'telepsychiatry')->name('telepsychiatry');

Route::get('/patient-information', [PatientInformationController::class, 'index'])
    ->name('patient-information');

Route::view('/office-fees-policies', 'office-fees-policies', [
    'policies' => PracticePolicyCatalog::all(),
])->name('office-fees-policies');

Route::get('/appointments', [AppointmentController::class, 'index'])
    ->name('appointments');

Route::get('/patient-portal', [PatientPortalController::class, 'index'])
    ->name('patient-portal');

Route::view('/contact', 'contact')->name('contact');
