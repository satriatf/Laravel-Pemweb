<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// route root
Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan dashboard
Route::get('admin/dashboard', [DashboardController::class, 'index']);

Route::get('admin/student', [StudentController::class, 'index']);