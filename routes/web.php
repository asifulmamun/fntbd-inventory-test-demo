<?php

use App\Http\Controllers\Web\ToolController;
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
    
    // Tools
    Route::get('tools', [\App\Http\Controllers\Web\ToolController::class, 'index'])->name('tools.index');
    // Route::get('tools/{id}', [ToolController::class, 'show'])->name('tools.show');
    Route::get('tools/create', [ToolController::class, 'create'])->name('tools.create');
    Route::post('tools', [ToolController::class, 'store'])->name('tools.store');
    Route::get('tools/{id}/edit', [ToolController::class, 'edit'])->name('tools.edit');
    Route::put('tools/{id}', [ToolController::class, 'update'])->name('tools.update');
    Route::delete('tools/{id}', [ToolController::class, 'destroy'])->name('tools.destroy');
    // Route::post('tools/import', [\App\Http\Controllers\Web\ImportExportController::class, 'importTools']);
    // Route::get('tools/export', [\App\Http\Controllers\Web\ImportExportController::class, 'exportTools']);

});
