<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;

// landing page route
Route::get('/', function () {
    return view('landing');
})->name('landing');

// About routes
Route::get('/about/team', [PublicController::class, 'team'])->name('team');

Route::get('/about/contact', function () {
    return view('about.contact');
})->name('contact');

Route::get('/about/emergency', function () {
    return view('about.emergency');
})->name('emergency');

// Services routes
Route::get('/services', [PublicController::class, 'services'])->name('services');

Route::get('/services/pricing', [PublicController::class, 'pricing'])->name('pricing');

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
    // route untuk pembayaran transaksi (dummy payment)
    Route::post('/transaction/{transaction}/pay', [DashboardController::class, 'payTransaction'])->name('pay-transaction');
    // route untuk edit profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.update-password');
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
    // route untuk edit profile
    Route::get('/profile', [DoctorDashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DoctorDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DoctorDashboardController::class, 'updatePassword'])->name('profile.update-password');
});

// Admin Dashboard routes (protected by auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Team Management
    Route::get('/team', [AdminController::class, 'team'])->name('team');
    Route::put('/doctor/{doctor}/team-status', [AdminController::class, 'updateDoctorTeamStatus'])->name('doctor.update-team-status');
    Route::post('/staff', [AdminController::class, 'storeStaff'])->name('staff.store');
    Route::put('/staff/{user}', [AdminController::class, 'updateStaff'])->name('staff.update');
    Route::delete('/staff/{user}', [AdminController::class, 'destroyStaff'])->name('staff.destroy');
    
    // Service Management
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'destroyService'])->name('services.destroy');
});
