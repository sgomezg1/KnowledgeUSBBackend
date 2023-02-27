<?php

use App\Http\Controllers\BuscadorProyectosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvestigadoresController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UserController;
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
    ], function () {
        Route::get('datos-usu', [UserController::class, 'getDatosUsuNavbar']);
        Route::post('aceptar-politicas', [UserController::class, 'aceptarPoliticas']);
        Route::get('logout', [UserController::class, 'logout']);
        Route::get('user', [UserController::class, 'user']);
    });
});

Route::get('/filtros/{rol}', [IndexController::class, 'consultarFiltros']);

Route::group([
    'prefix' => '',
    'middlewade' => 'auth:api'
], function () {
    Route::get('/programas', [IndexController::class, 'getProgramas']);
    Route::get('/facultades', [IndexController::class, 'getFacultades']);
});

Route::group([
    'prefix' => 'proyectos'
], function () {
    Route::post('/', [BuscadorProyectosController::class, 'showProyectos']);
    Route::get('/{id}', [BuscadorProyectosController::class, 'proyecto']);
});

Route::group([
    'prefix' => 'investigadores',
], function () {
    Route::post('/', [InvestigadoresController::class, 'getinvestigadores']);
    Route::get('/{id}', [InvestigadoresController::class, 'getInvestigador']);
});

Route::group([
    'prefix' => 'reportes',
    'middleware' => 'auth:api'
], function () {
    Route::post('/presupuestos', [ReportesController::class, 'proyectosConPresupuesto']);
    Route::post('/convocatorias', [ReportesController::class, 'proyectosPorConvocatoria']);
    Route::post('/integrantes', [ReportesController::class, 'proyectosRequierenIntegrantes']);
    Route::post('/semillero', [ReportesController::class, 'proyectosDeSemillero']);
    Route::post('/proyectos-aula', [ReportesController::class, 'proyectosDeAula']);
    Route::post('/investigadores-independientes', [ReportesController::class, 'proyectosInvestigadoresIndependientes']);
    Route::post('/trabajo-de-grado', [ReportesController::class, 'proyectosTrabajoDeGrado']);
    Route::post('/facultad/{id}', [ReportesController::class, 'proyectosPorFacultad']);
    Route::post('/programa/{id}', [ReportesController::class, 'proyectosPorPrograma']);
});

Route::group([
    'prefix' => 'graficos',
    'middleware' => 'auth:api'
], function () {
    Route::get('/elementos-dashboard', [DashboardController::class, 'elementosDashboard']);
    Route::get('/datos-graficas-finalizados-facultad', [DashboardController::class, 'datosGraficoProyectosFinalizadosPorFacultad']);
    Route::get('/datos-graficas-grado-semillero-facultad', [DashboardController::class, 'datosProyectoGradoSemilleroPorFacultad']);
    Route::get('/datos-graficas-presupuesto-proyectos-por-mes', [DashboardController::class, 'datosGraficaPresupuesto']);
});
