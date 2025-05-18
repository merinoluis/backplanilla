<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'register']);

// Ruta para iniciar sesión
Route::post('/signin', [AuthController::class, 'signIn']);

// Ruta para cerrar sesión (requiere autenticación)
Route::middleware('auth:sanctum')->post('/signout', [AuthController::class, 'signOut']);
