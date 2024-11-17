<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogInController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LogInController::class, 'login']);
Route::get('/logout', [LogInController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/{id}', [DashboardController::class, 'show']);
Route::post('/dashboard', [DashboardController::class, 'create']);
Route::delete('/dashboard/{id}', [DashboardController::class, 'delete']);
Route::get('/update_resume/{id}', [DashboardController::class, 'show']);
Route::post('/add_application', [DashboardController::class, 'add_application']);

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/add_resume', function () {
    return view('add_resume');
});
