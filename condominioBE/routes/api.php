<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ChatController;

Route::post('/mensaje', [ChatController::class, 'enviar']);
Route::post('/notificacion', [NotificacionController::class, 'enviar']);