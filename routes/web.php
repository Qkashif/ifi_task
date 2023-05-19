<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Auth::routes(['register' => false]);

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('home');
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});
