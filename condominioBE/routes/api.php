<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::post('/mensaje', [ChatController::class, 'enviar']);