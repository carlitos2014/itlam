<?php

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


Auth::routes();
Route::get('/home', 'HomeController@index');

Route::resource('sedes', 'SedeController');
Route::resource('noConformidades', 'NoConformidadController');

Route::resource('cargarArchivos', 'ArchivoController'); //CRUD

Route::get('auditorias/programacion','AuditoriaController@programacion')->name('auditorias.programacion');
Route::get('auditorias/programacion/pdf','AuditoriaController@programacionBuildPdf')->name('auditorias.programacion.buildPdf');

