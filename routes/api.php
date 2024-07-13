<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth.api:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/email/verification-notification', [VerificationController::class, 'sendVerificationEmail']);
});


Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth:sanctum', 'throttle:6,1'])
    ->name('verification.send');

Route::middleware(['auth.api:sanctum', 'verified.api'])->group(function () {
    // Protected routes for verified users
    Route::group(['prefix' => 'task'], function (){
        Route::get('', [TaskController::class, 'index'])->name('index_task');
        Route::get('/create', [TaskController::class, 'create'])->name('create_task');
        Route::post('/store', [TaskController::class, 'store'])->name('store_task');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit_task')->middleware('access');
        Route::post('/update', [TaskController::class, 'update'])->name('update_task')->middleware('access');
        Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('delete_task')->middleware('access');
        Route::get('/show/{id}', [TaskController::class, 'show'])->name('show_task')->middleware('access');
    });
});

