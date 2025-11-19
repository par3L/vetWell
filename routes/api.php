<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ApiController;

// Login endpoint untuk generate token
Route::post('login', function(Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Routes dengan auth:sanctum middleware
Route::middleware('auth:sanctum')->controller(ApiController::class)->group(function () {
    // Pet APIs
    Route::get('pets', 'getPets');
    Route::post('pets/create', 'createPet');
    Route::post('pets/edit/{id}', 'updatePet');
    Route::post('pets/delete/{id}', 'destroyPet');
    
    // Appointment APIs
    Route::get('appointments', 'getAppointments');
    Route::post('appointments/create', 'createAppointment');
    Route::post('appointments/edit/{id}', 'updateAppointment');
    Route::post('appointments/cancel/{id}', 'cancelAppointment');
    
    // Service APIs (read-only)
    Route::get('services', 'getServices');
    
    // Doctor APIs (read-only)
    Route::get('doctors', 'getDoctors');
    
    // Transaction APIs
    Route::post('transactions/pay/{id}', 'payTransaction');
});
