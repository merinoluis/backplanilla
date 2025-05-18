<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;

Route::prefix('carros')->group(function () {
    Route::get('/', [CarroController::class, 'index']);
    Route::post('/', [CarroController::class, 'store']);
    Route::get('/{id}', [CarroController::class, 'show']);
    Route::put('/{id}', [CarroController::class, 'update']);
    Route::delete('/{id}', [CarroController::class, 'destroy']);
});
