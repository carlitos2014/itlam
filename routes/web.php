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

	Route::get('auditorias/programacion','AuditoriaController@programacion')->name('auditorias.programacion');
	Route::get('auditorias/programacion/pdf','AuditoriaController@programacionBuildPdf')->name('auditorias.programacion.buildPdf');

	Route::get('academic', 'Academic\StorageController@loadFile')->name('academic.loadfile');
	Route::post('storage/create', 'StorageController@save');
	Route::get('storage/{archivo}', function ($archivo) {
		$public_path = public_path();
		$url = $public_path.'/storage/'.$archivo;
		//verificamos si el archivo existe y lo retornamos
		if (Storage::exists($archivo))
		{
		  return response()->download($url);
		}
		//si no se encuentra lanzamos un error 404.
		abort(404);
   
   });
   
});