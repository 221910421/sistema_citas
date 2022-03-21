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