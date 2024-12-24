<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Lindungi route dengan middleware Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);     // <--- Tambahkan route ini
    Route::post('/logout', [AuthController::class, 'logout']);
});
