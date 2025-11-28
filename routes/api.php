<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AplicacionInsumoController;
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

    // CRUD Cultivos
    Route::apiResource('cultivos', CultivoController::class);

    // CRUD Animales
    Route::apiResource('animales', AnimalController::class);

    // Aplicaciones de insumos POR cultivo
    Route::get('/cultivos/{cultivo}/insumos', [AplicacionInsumoController::class, 'index']);
    Route::post('/cultivos/{cultivo}/insumos', [AplicacionInsumoController::class, 'store']);
    Route::get('/cultivos/{cultivo}/insumos/{insumo}', [AplicacionInsumoController::class, 'show']);
    Route::put('/cultivos/{cultivo}/insumos/{insumo}', [AplicacionInsumoController::class, 'update']);
    Route::delete('/cultivos/{cultivo}/insumos/{insumo}', [AplicacionInsumoController::class, 'destroy']);

    // Reportes PDF
    Route::get('/reportes/cultivos', [ReportController::class, 'cultivosPdf']);
    Route::get('/reportes/animales', [ReportController::class, 'animalesPdf']);

});