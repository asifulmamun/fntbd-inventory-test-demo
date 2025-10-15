<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth (Blade, session guard)
Route::get('/login', [\App\Http\Controllers\Web\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\Web\AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [\App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Web\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('billables', \App\Http\Controllers\Web\BillableWebController::class)->except(['show']);
    Route::resource('consumables', \App\Http\Controllers\Web\ConsumableWebController::class)->except(['show']);
});
