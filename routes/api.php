<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pacientesApi;

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

Route::get('/pacientesApi', [pacientesApi::class, 'index'])->name('pacientesApi');

Route::get('/pacientesApi/buscar', [pacientesApi::class, 'show'])->name('pacientesApi/buscar');

Route::put('/pacientesApi/actualizar', [pacientesApi::class, 'update'])->name('pacientesApi/actualizar');

Route::put('/pacientesApi/borrar', [pacientesApi::class, 'destroy'])->name('pacientesApi/borrar');
