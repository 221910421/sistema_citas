<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pacientesApi;
use App\Http\Controllers\citasApi;
use App\Http\Controllers\serviciosApi;

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

//Routes pacientes Api
Route::get('/pacientesApi', [pacientesApi::class, 'index'])->name('pacientesApi');

Route::get('/pacientesApi/buscar', [pacientesApi::class, 'show'])->name('pacientesApi/buscar');

Route::put('/pacientesApi/actualizar', [pacientesApi::class, 'update'])->name('pacientesApi/actualizar');

Route::delete('/pacientesApi/borrar', [pacientesApi::class, 'destroy'])->name('pacientesApi/borrar');

Route::post('/pacientesApi/guardar', [pacientesApi::class, 'store'])->name('pacientesApi/guardar');

//Routes citas Api
Route::get('/citasApi', [citasApi::class, 'index'])->name('citasApi');

Route::post('/citasApi/guardar', [citasApi::class, 'store'])->name('citasApi/guardar');

Route::get('/citasApi/buscar', [citasApi::class, 'show'])->name('citasApi/buscar');

Route::put('/citasApi/actualizar', [citasApi::class, 'update'])->name('citasApi/actualizar');

Route::delete('/citasApi/borrar', [citasApi::class, 'destroy'])->name('citasApi/borrar');


//Routes servicios Api
Route::get('/serviciosApi', [serviciosApi::class, 'index'])->name('serviciosApi');
