<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ChatController;

Route::post('/mensaje', [ChatController::class, 'enviar']);
Route::post('/notificacion', [NotificacionController::class, 'enviar']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return 'Solo admin';
        });
    });

    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', function () {
            return 'Email verificado';
        });
    });

});
