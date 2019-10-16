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
Route::get('password/email/{id}', 'Auth\ForgotPasswordController@sendEmail');
Route::get('password/reset/{id}', 'Auth\ForgotPasswordController@showResetForm');
Route::group(['prefix'=>'auth', 'as'=>'auth.', 'namespace'=>'Auth'], function() {
	Route::resource('usuarios', 'RegisterController');
	Route::resource('roles', 'RoleController');
	Route::resource('permisos', 'PermissionController');
});

Route::group(['middleware'=>'auth'], function() {
	
	Route::get('/', 'HomeController@index');
	
	Route::group(['prefix'=>'app', 'as'=>'app.', 'namespace'=>'App'], function() {
		Route::resource('firmas', 'FirmaController'); //CRUD
	});

	/* Modulo Sedes */
	Route::resource('sedes', 'Sede\SedeController');

	/* Route::resource('noConformidades', 'NoConformidadController');
	Route::resource('cargarArchivos', 'ArchivoController'); //CRUD */

	/* Modulo Academico */
	Route::resource('academic', 'Academic\AcademicController'); //CRUD
	Route::resource('academicWorkplan', 'Academic\WorkplanController');
	Route::resource('academic.index', 'Academic\AcademicController');
	Route::get('academic/download/{academic}', 'Academic\AcademicController@downloadFile')->name('academic.download'); //Ruta para descargar archivo
	/* Academic Asignacion */
	Route::resource('asignacion', 'Academic\AsignacionController');//Crud
	Route::get('asignacion/download/{asignacion}', 'Academic\AsignacionController@downloadFile')->name('asignacion.download'); //Ruta para descargar archivo

	/* Modulo de Profesores */
	Route::resource('teacher', 'Teacher\TeacherController'); //Crud

	/* Modulo de Sgsst */
	Route::resource('sgsst_s', 'Sgsst\SgsstController'); //Crud
	Route::get('sgsst_s/download/{sgsst_s}', 'Sgsst\SgsstController@downloadFile')->name('sgsst_s.download'); //Ruta para descargar archivo

	/* Procesos */
	Route::resource('auditorias', 'Auditorias\AuditoriaController');
	Route::group(['prefix'=>'auditorias', 'as'=>'auditorias.', 'namespace'=>'Auditorias'], function() {
		Route::resource('procesos', 'ProcesosController');
		Route::resource('auditors', 'AuditorController');
		Route::resource('auditoriaProcesos', 'AuditoriaProcesoController')->except(['index','show']);
		Route::get('/pdf/{id}','AuditoriaController@programacionBuildPdf')->name('buildPdf');

		Route::resource('seguimientos', 'CronogramaController', ['parameters'=>['seguimiento'=>'auditoria']]);
		Route::get('seguimientos/cargaEventos','CronogramaController@cargaEventos');
		// Route::post('seguimientos/guardaEventos', 'CronogramaController@store');
		// Route::get('seguimientos/guardarCronogramas', 'CronogramaController@guardarCronogramas');

		// Route::get('seguimientos/getCronogramas/{username}', 'CronogramaController@getCronogramas');
		// //Route::get('seguimientos/delete/{RESE_ID}', 'CronogramaController@delete');
		// Route::get('seguimientos/confirmar/{RESE_ID}', 'CronogramaController@confirmar');
		// Route::get('seguimientos/activar/{RESE_ID}', 'CronogramaController@activar');
		// Route::get('seguimientos/finalizar/{RESE_ID}', 'CronogramaController@finalizar');

	});

});
