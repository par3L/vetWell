<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\DoctorDashboardController;

// landing page route
Route::get('/', function () {
    return view('landing');
})->name('landing');

// About routes
Route::get('/about/team', function () {
    return view('about.team');
})->name('team');

Route::get('/about/contact', function () {
    return view('about.contact');
})->name('contact');

Route::get('/about/emergency', function () {
    return view('about.emergency');
})->name('emergency');

// Services routes
Route::get('/services', function () {
    return view('services.index');
})->name('services');

Route::get('/services/pricing', function () {
    return view('services.pricing');
})->name('pricing');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    // Doctor registration
    Route::get('/dokter/register', [DoctorAuthController::class, 'showRegister'])->name('doctor.register');
    Route::post('/dokter/register', [DoctorAuthController::class, 'register'])->name('doctor.register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard routes (protected by auth middleware)
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
    Route::get('/book-appointment', [DashboardController::class, 'createBooking'])->name('create-booking');
    Route::post('/book-appointment', [DashboardController::class, 'storeBooking'])->name('store-booking');
    Route::put('/bookings/{appointment}', [DashboardController::class, 'updateBooking'])->name('update-booking');
    Route::delete('/bookings/{appointment}/cancel', [DashboardController::class, 'cancelBooking'])->name('cancel-booking');
    Route::post('/transaction/{transaction}/pay', [DashboardController::class, 'payTransaction'])->name('pay-transaction');
});

// Pet management routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::resource('pets', PetController::class)->except(['show']);
});

// Doctor Dashboard routes (protected by auth middleware)
Route::middleware('auth')->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/appointment/{appointment}', [DoctorDashboardController::class, 'showAppointment'])->name('appointment.show');
    Route::post('/appointment/{appointment}/add-service', [DoctorDashboardController::class, 'addService'])->name('appointment.add-service');
    Route::put('/appointment/{appointment}/notes', [DoctorDashboardController::class, 'updateNotes'])->name('appointment.update-notes');
    Route::put('/appointment/{appointment}/complete', [DoctorDashboardController::class, 'completeAppointment'])->name('appointment.complete');
    Route::put('/appointment/{appointment}/confirm', [DoctorDashboardController::class, 'confirmAppointment'])->name('appointment.confirm');
});
