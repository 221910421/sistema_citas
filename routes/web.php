<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjemploController;
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

Route::name('index')->get('/', function () {
    return view('templates.index');
});


///---------------iniciar sesion--------------
Route::get('iniciarsesion/', function () {
    return view('templates.iniciar_sesion');
});
Route::name('login')->post('login/', 'App\Http\Controllers\loginController@validar');
Route::name('salir')->get('salir/', 'App\Http\Controllers\loginController@logout');


//------------------Usuarios--------------
Route::name('crear_usuario')->get('/crear_usuario', function () {
    return view('templates.crear_usuario');
});
Route::name('usuarios')->get('usuarios/', 'App\Http\Controllers\SystemController@verusuarios');
Route::name('guardar_usuario')->post('guardar_usuario/', 'App\Http\Controllers\SystemController@nuevousuario');
Route::name('actualizartablausu')->get('actualiartabalausuarios/', 'App\Http\Controllers\SystemController@actualizartablausuarios');
Route::name('detallesusu')->post('detalles-usuario/', 'App\Http\Controllers\SystemController@detallesusu');
Route::name('misdatos')->get('misdatos/', 'App\Http\Controllers\UserController@verdatosuser');
Route::name('actualizar_datos')->post('actualizar_datos/', 'App\Http\Controllers\UserController@actualizar_datos');


//-----------------Citas--------------------//
Route::name('nueva_cita')->get('nueva_cita/', 'App\Http\Controllers\SystemController@nueva_cita');
Route::name('consultorios_cita')->get('consultorios_cita/', 'App\Http\Controllers\CitasController@consultorios_cita');
Route::name('guardar_cita')->post('guardar_cita/', 'App\Http\Controllers\SystemController@guardar_cita');
Route::name('fechas_ocupadas')->post('fechas_ocupadas/', 'App\Http\Controllers\SystemController@fechas_ocupadas');


//------------------Consultorios---------------------------//
Route::name('nuevo_consultorio')->get('nuevo_consultorio/', 'App\Http\Controllers\SystemController@nuevo_consultorio');

Route::name('guardar_consultorio')->post('guardar_consultorio/', 'App\Http\Controllers\SystemController@guardar_consultorio');
