<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\PasswordResetController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\TipoIngresoController;
use App\Http\Controllers\TipoDescuentoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\OrganizacionController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\BoletaPagoController;
use App\Http\Controllers\BusquedaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('catalogos', CatalogoController::class);
Route::apiResource('organizaciones', OrganizacionController::class);
Route::apiResource('presupuestos', PresupuestoController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('privilegios', PrivilegioController::class);
Route::apiResource('boletas-pago', BoletaPagoController::class);

Route::get('buscar', [BusquedaController::class, 'buscar']);
Route::apiResource('empleados', EmpleadoController::class);
Route::get('/planilla', [PlanillaController::class, 'generar']);
Route::apiResource('ingresos', IngresoController::class)->only(['index', 'store']);
Route::apiResource('descuentos', DescuentoController::class)->only(['index', 'store']);
Route::post('planilla/generar', [PlanillaController::class, 'generar']);
Route::apiResource('tipo-ingresos', TipoIngresoController::class);
Route::apiResource('tipo-descuentos', TipoDescuentoController::class);
Route::apiResource('puestos', PuestoController::class);
Route::get('/empresa', [EmpresaController::class, 'index']);
Route::post('/empresa', [EmpresaController::class, 'update']);
Route::apiResource('usuarios', UsuarioController::class);
