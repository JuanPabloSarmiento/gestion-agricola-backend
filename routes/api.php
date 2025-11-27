<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Público
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protegido con Sanctum
    Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::apiResource('cultivos', CultivoController::class);
    Route::apiResource('animales', AnimalController::class);

    Route::get('/reportes/cultivos', [ReportController::class, 'cultivosPdf']);
    Route::get('/reportes/animales', [ReportController::class, 'animalesPdf']);


});
