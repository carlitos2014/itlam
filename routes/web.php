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
	
	/* Modulo Sedes */
	Route::resource('sedes', 'Sede\SedeController');

	Route::resource('noConformidades', 'NoConformidadController');
	Route::resource('cargarArchivos', 'ArchivoController'); //CRUD

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

	/* Pporcesos */
	Route::resource('procesos', 'ProcesosController');
	Route::resource('auditors', 'AuditorController');
	Route::resource('auditorias', 'AuditoriaController');
	Route::group(['prefix'=>'auditorias', 'as'=>'auditorias.'], function() {
		Route::get('/pdf/{id}','AuditoriaController@programacionBuildPdf')->name('buildPdf');
	});
	Route::resource('auditoriaProcesos', 'AuditoriaProcesoController')->except(['index','show']);

});
