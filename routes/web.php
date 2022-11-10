<?php

use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/datos-genera-reporte', [ReportesController::class, 'getDataUsuarioGeneraReporte']);
Route::get('/generar-pdf', [ReportesController::class, 'generarReportes']);
Route::get('/test-vista-pdf', [ReportesController::class, 'getVistaReportes']);
