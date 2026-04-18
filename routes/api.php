<?php

use Illuminate\Support\Facades\Route;

// Inventory API v1
Route::prefix('v1')->group(function () {
    // Auth
    Route::post('auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('auth/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('auth/me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->middleware('auth:api');

    Route::middleware('auth:api')->group(function () {
        // Dashboard
        Route::get('dashboard/summary', [\App\Http\Controllers\Api\DashboardController::class, 'summary']);

        
        // Billables
        Route::get('billables', [\App\Http\Controllers\Api\BillableController::class, 'index']);
        Route::get('billables/{id}', [\App\Http\Controllers\Api\BillableController::class, 'show']);
        Route::post('billables', [\App\Http\Controllers\Api\BillableController::class, 'store']);
        Route::put('billables/{id}', [\App\Http\Controllers\Api\BillableController::class, 'update']);
        Route::delete('billables/{id}', [\App\Http\Controllers\Api\BillableController::class, 'destroy']);
        Route::post('billables/import', [\App\Http\Controllers\Api\ImportExportController::class, 'importBillables']);
        Route::get('billables/export', [\App\Http\Controllers\Api\ImportExportController::class, 'exportBillables']);

        // Consumables
        Route::get('consumables', [\App\Http\Controllers\Api\ConsumableController::class, 'index']);
        Route::get('consumables/{id}', [\App\Http\Controllers\Api\ConsumableController::class, 'show']);
        Route::post('consumables', [\App\Http\Controllers\Api\ConsumableController::class, 'store']);
        Route::put('consumables/{id}', [\App\Http\Controllers\Api\ConsumableController::class, 'update']);
        Route::delete('consumables/{id}', [\App\Http\Controllers\Api\ConsumableController::class, 'destroy']);
        Route::post('consumables/import', [\App\Http\Controllers\Api\ImportExportController::class, 'importConsumables']);
        Route::get('consumables/export', [\App\Http\Controllers\Api\ImportExportController::class, 'exportConsumables']);

        // Attachments
        Route::post('attachments', [\App\Http\Controllers\Api\AttachmentController::class, 'store']);
        Route::get('attachments/{id}/download', [\App\Http\Controllers\Api\AttachmentController::class, 'download']);

        // Admin
        // Route::get('users', [\App\Http\Controllers\Api\Admin\UserController::class, 'index']);
        // Route::post('users', [\App\Http\Controllers\Api\Admin\UserController::class, 'store']);
        // Route::get('roles', [\App\Http\Controllers\Api\Admin\RoleController::class, 'index']);
        // Route::post('roles', [\App\Http\Controllers\Api\Admin\RoleController::class, 'store']);
    });
});


