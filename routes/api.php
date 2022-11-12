<?php

use App\Http\Controllers\BuscadorProyectosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvestigadoresController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('prevLogin', [UserController::class, 'prevLogin']);
    Route::post('login', [UserController::class, 'login']);

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('aceptar-politicas', [UserController::class, 'aceptarPoliticas']);
        Route::get('logout', [UserController::class, 'logout']);
        Route::get('user', [UserController::class, 'user']);
    });
});

Route::group([
    'prefix' => '',
    'middlewade' => 'auth:api'
], function() {
    Route::get('/filtros', [IndexController::class, 'consultarFiltros']);
});

Route::group([
    'prefix' => 'proyectos',
    'middleware' => 'auth:api'
], function() {
    Route::post('/', [BuscadorProyectosController::class, 'showProyectos']);
    Route::get('/{id}', [BuscadorProyectosController::class, 'proyecto']);
});

Route::group([
    'prefix' => 'reportes',
    'middleware' => 'auth:api'
], function() {
    Route::post('/presupuestos', [ReportesController::class, 'proyectosConPresupuesto']);
    Route::post('/convocatorias', [ReportesController::class, 'proyectosPorConvocatoria']);
    Route::post('/integrantes', [ReportesController::class, 'proyectosRequierenIntegrantes']);
    Route::post('/semillero', [ReportesController::class, 'proyectosRequierenIntegrantes']);
    Route::post('/investigadores-independientes', [ReportesController::class, 'proyectosInvestigadoresIndependientes']);
    Route::post('/trabajo-de-grado', [ReportesController::class, 'proyectosTrabajoDeGrado']);
    Route::post('/facultad/{id}', [ReportesController::class, 'proyectosPorFacultad']);
    Route::post('/programa/{id}', [ReportesController::class, 'proyectosPorPrograma']);
});
