<?php

use Illuminate\Support\Facades\Route;

// landing page route
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Temporary login route (will be replaced with actual auth later)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
