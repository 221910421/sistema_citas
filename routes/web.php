<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\SystemController;
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
Route::name('login')->post('login/', 'App\Http\Controllers\LoginController@validar');
Route::name('salir')->get('salir/', 'App\Http\Controllers\LoginController@logout');


//------------------Usuarios--------------
Route::name('crear_usuario')->get('/crear_usuario', function () {
    return view('templates.crear_usuario');
});
Route::name('usuarios')->get('usuarios/', 'App\Http\Controllers\SystemController@verusuarios');
Route::name('guardar_usuario')->post('guardar_usuario/', 'App\Http\Controllers\SystemController@nuevousuario');
Route::name('verificar_sesion')->get('verificar_sesion/', 'App\Http\Controllers\SystemController@verificar_sesion');
Route::name('detallesusu')->post('detalles-usuario/', 'App\Http\Controllers\SystemController@detallesusu');
Route::name('misdatos')->get('misdatos/', 'App\Http\Controllers\UserController@verdatosuser');
Route::name('actualizar_datos')->post('actualizar_datos/', 'App\Http\Controllers\UserController@actualizar_datos');
Route::name('verificar_correo')->post('verficar_correo/', 'App\Http\Controllers\UserController@verificar_correo');


//-----------------Citas--------------------//
Route::name('nueva_cita')->get('nueva_cita/', 'App\Http\Controllers\SystemController@nueva_cita');
Route::name('consultorios_cita')->get('consultorios_cita/', 'App\Http\Controllers\CitasController@consultorios_cita');
Route::name('guardar_cita')->post('guardar_cita/', 'App\Http\Controllers\SystemController@guardar_cita');
Route::name('citas')->get('citas/', 'App\Http\Controllers\SystemController@citas');
Route::name('detalles_cita')->post('detalles_cita/', 'App\Http\Controllers\SystemController@detalles_cita');
Route::name('guardar_detalles_cita')->post('guardar_detalles_cita/', 'App\Http\Controllers\SystemController@guardar_detalles_cita');
Route::name('cancelar_cita')->post('cancelar_cita/', 'App\Http\Controllers\SystemController@cancelar_cita');
Route::name('horarios_cita')->get('horarios_cita/', 'App\Http\Controllers\SystemController@horarios_cita');
Route::name('busqueda_tiempo_real')->get('busqueda_tiempo_real', 'App\Http\Controllers\SystemController@busqueda_tiempo_real');
Route::name('excel')->get('/excel', 'App\Http\Controllers\SystemController@export');
Route::name('pdf')->get('/pdf', 'App\Http\Controllers\SystemController@download');


//------------------Consultorios---------------------------//
Route::name('nuevo_consultorio')->get('nuevo_consultorio/', 'App\Http\Controllers\SystemController@nuevo_consultorio');
Route::name('guardar_consultorio')->post('guardar_consultorio/', 'App\Http\Controllers\SystemController@guardar_consultorio');
Route::name('consultorios')->get('consultorios/', 'App\Http\Controllers\SystemController@consultorios');
Route::name('editar_consultorio')->post('editar_consultorio/', 'App\Http\Controllers\SystemController@editar_consultorio');
Route::name('actualizar_consultorio')->post('actualizar_consultorio/', 'App\Http\Controllers\SystemController@actualizar_consultorio');
Route::name('borrar_consultorio')->post('borrar_consultorio/', 'App\Http\Controllers\SystemController@borrar_consultorio');

//-------------------Especialidad-------------------------//
Route::name('crear_especialidad')->get('/crear_especialidad', function () {
    return view('templates.especialidades.crear_especialidades');
});
Route::name('guardar_especialidad')->post('guardar_especialidad/', 'App\Http\Controllers\SystemController@guardar_especialidad');
Route::name('ver_especialidad')->get('ver_especialidad/', 'App\Http\Controllers\SystemController@ver_especialidad');
Route::name('editar_especialidad')->post('editar_especialidad/', 'App\Http\Controllers\SystemController@editar_especialidad');
Route::name('actualizar_especialidad')->post('actualizar_especialidad/', 'App\Http\Controllers\SystemController@actualizar_especialidad');
Route::name('borrar_especialidad')->post('borrar_especialidad/', 'App\Http\Controllers\SystemController@borrar_especialidad');


//-----------------------PAYPAL
Route::get('crear_pago', [PaypalController::class, 'crear_pago'])->name('crear_pago');
Route::get('proceso_pago', [PaypalController::class, 'proceso_pago'])->name('proceso_pago');
Route::get('iniciar_pago', [PaypalController::class, 'iniciar_pago'])->name('iniciar_pago');
Route::get('cancelar_pago', [PaypalController::class, 'cancelar_pago'])->name('cancelar_pago');
