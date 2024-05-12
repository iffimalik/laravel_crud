<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Spatie authentication routes
    Auth::routes();


// Define authentication middleware for the products routes
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});

// Redirect to registration page
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);

// Define authentication related routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
