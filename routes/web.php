<?php

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

//------------------citas------------------
Route::name('citas')->get('citas/', 'App\Http\Controllers\SystemController@vercitas');

Route::name('citas')->get('citas/', 'App\Http\Controllers\SystemController@vercitas');

//--------------doctores----------------
Route::name('doctores')->get('doctores/', 'App\Http\Controllers\SystemController@verdoctores');

//--------------Consultorios----------------
Route::name('consultorios')->get('consultorios/', 'App\Http\Controllers\SystemController@verconsultorios');

//--------------especialidades----------------
Route::name('especialidades')->get('especialidades/', 'App\Http\Controllers\SystemController@verespecialidades');

//--------------consultas----------------
Route::name('consultas')->get('consultas/', 'App\Http\Controllers\SystemController@verconsultas');