<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AsisstsController;
use App\Http\Controllers\ReportsController;
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
Route::get('trabajadores/getexportpdf', [EmployeesController::class, 'getexportPDF']);
Route::get('trabajadores/getEmployees', [EmployeesController::class, 'getEmployees']);
Route::resource('trabajadores', EmployeesController::class);
Route::get('asistencias/getAssists', [AsisstsController::class, 'getAssists']);
Route::post('asistencias/import', [AsisstsController::class, 'import']);
Route::resource('asistencias', AsisstsController::class);
Route::get('reports', [ReportsController::class, 'index']);
Route::get('reports/create', [ReportsController::class, 'create']);
Route::get('reports/getAll', [ReportsController::class, 'getAll']);