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

Auth::routes();

Route::group(['middleware'=>'auth'], function() {

	Route::get('/', 'HomeController@index');

	Route::resource('sedes', 'SedeController');
	Route::resource('noConformidades', 'NoConformidadController');
	Route::resource('cargarArchivos', 'ArchivoController'); //CRUD

	Route::resource('academic', 'AcademicController'); //CRUD
	Route::resource('academicWorkplan', 'WorkplanController');
	
	Route::resource('procesos', 'ProcesosController');
	Route::resource('auditors', 'AuditorController');
	Route::resource('auditorias', 'AuditoriaController');
	Route::group(['prefix'=>'auditorias', 'as'=>'auditorias.'], function() {
		Route::get('/pdf/{id}','AuditoriaController@programacionBuildPdf')->name('buildPdf');
	});
	Route::resource('auditoriaProcesos', 'AuditoriaProcesoController')->except(['index','show']);

});
