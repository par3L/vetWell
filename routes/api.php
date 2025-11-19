<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ApiController;

// endpoint login untuk generate authentication token
Route::post('login', function(Request $request) {
    $credentials = $request->only('email', 'password');
    
    // coba login dengan email dan password
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        // generate token untuk API authentication
        $token = $user->createToken('api-token')->plainTextToken;
        
        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user
        ]);
    }
    
    return response()->json([
        'status' => 'error',
        'message' => 'Email atau password salah'
    ], 401);
});

// endpoint untuk ambil data user yang sedang login
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// group API routes yang membutuhkan authentication token
Route::middleware('auth:sanctum')->controller(ApiController::class)->group(function () {
    // Pet APIs - CRUD untuk pet milik user
    Route::get('pets', 'getPets');
    Route::post('pets/create', 'createPet');
    Route::post('pets/edit/{id}', 'updatePet');
    Route::post('pets/delete/{id}', 'destroyPet');
    
    // Appointment APIs - CRUD untuk appointment milik user
    Route::get('appointments', 'getAppointments');
    Route::post('appointments/create', 'createAppointment');
    Route::post('appointments/edit/{id}', 'updateAppointment');
    Route::post('appointments/cancel/{id}', 'cancelAppointment');
    
    // Service APIs - list semua service yang tersedia
    Route::get('services', 'getServices');
    
    // Doctor APIs - list semua doctor yang tersedia
    Route::get('doctors', 'getDoctors');
    
    // Transaction APIs - pembayaran transaksi
    Route::post('transactions/pay/{id}', 'payTransaction');
});
