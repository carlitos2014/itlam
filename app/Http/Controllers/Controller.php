<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorMessages;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	/**
	 * Obtiene datos para select2 con ajax.
	 *
	 * @param  Request $request
	 * @return json
	 */
	public function ajax(Request $request)
	{
		$model = $request->input('model');
		$column = $request->input('column');
		$filter = $request->input('q');

		$arrModel = array_filter( model_to_array($model, $column) , function($item) use ($filter){
				return preg_match('/'.$filter.'/i', $item);
			});
		return response()->json($arrModel);
	}


	/**
	 * {@inheritdoc}
	 */
	protected function formatValidationErrors(ValidatorMessages $validator)
	{
		return $validator->errors()->all();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validateRules($data, $id = 0)
	{
		return Validator::make($data, call_user_func($this->class.'::rules', $id));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @param  array  $relations
	 * @return Response
	 */
	protected function storeModel(array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = $this->getRequest();

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$validator = $this->validateRules($data);
		
		if($validator->passes()){
			$class = get_model($this->class);

			//Se crea el registro.
			if(array_has($data, 'password'))
				$data['password'] = bcrypt($data['password']);
			$model = $class::create($data);
			//Se crean las relaciones
			$this->storeRelations($model, $relations);

			$nameClass = str_upperspace(class_basename($model));
			// redirecciona al index de controlador
			flash_alert( $nameClass.' '.$model->id.' creado exitosamente.', 'success' );
			return redirect()->route($this->route.'.index')->send();
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}		
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @param  array  $relations
	 * @return Response
	 */
	protected function updateModel($id, array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = $this->getRequest();

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$validator = $this->validateRules($data, $id);

		if($validator->passes()){
			$class = get_model($this->class);

			// Se obtiene el registro
			$model = $class::findOrFail($id);
			//y se actualiza con los datos recibidos.
			$model->update($data);

			//Se crean las relaciones
			$this->storeRelations($model, $relations);

			$nameClass = str_upperspace(class_basename($model));
			// redirecciona al index de controlador
			flash_alert( $nameClass.' '.$id.' modificado exitosamente.', 'success' );
			return redirect()->route($this->route.'.index')->send();
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}
	}

	/**
	 * Obtiene los datos recibidos por request, convierte a mayúsculas y elimina los input vacíos
	 *
	 * @return array
	 */
	protected function getRequest()
	{
		$exceptions = (isset($this->route) && in_array($this->route, [
			'app.menu',
			'auth.roles',
			'auth.permisos',
		]));

		$data = request()->all();
		foreach ($data as $input => $value) {
			if($value=='')
				$data[$input] = null;
			else {
				$data[$input] = ($exceptions || ($input == '_token') || is_array($value))
					? $value
					: mb_strtoupper($value);
			}
		};
		return $data;
	}

	/**
	 * Guarda las relaciones entre modelos.
	 *
	 * @param  Illuminate\Database\Eloquent\Model $model
	 * @param  array $relations
	 * @return void
	 */
	private function storeRelations($model, array $relations)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

		if(!empty($relations)){
			foreach ($relations as $relation => $ids) {
				$arrayIds = [];
				//Si $ids es un string, se refiere al nombre del campo en el form, por ende debe existir en $data
				if( is_string($ids) and $ids!='' and isset($data[$ids]))
					$arrayIds =  $data[$ids];

				if( is_array($ids) and !empty($ids) )
					$arrayIds = $ids;

				$model->$relation()->sync($arrayIds, true);
			}

		}
	}

	/**
	 * Elimina un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @param  string  $class
	 * @param  string  $redirect
	 * @return Response
	 */
	protected function destroyModel($id)
	{
		// Se obtiene el registro
		$class = get_model($this->class);
		$model = $class::findOrFail($id);

		$prefix = strtoupper(substr($class::CREATED_AT, 0, 4));
		$created_by = $prefix.'_CREADOPOR';

		$nameClass = str_upperspace(class_basename($model));

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($model->$created_by == 'SYSTEM'){
			flash_modal( $nameClass.' '.$id.' no se puede borrar (Creado por SYSTEM).', 'danger' );
		} else {

			$relations = $model->relationships('HasMany');

			if(!$this->validateRelations($nameClass, $relations)){
				$model->delete();
				flash_alert( $nameClass.' '.$id.' eliminado exitosamente.', 'success' );
			}
		}
		return redirect()->route($this->route.'.index')->send();
	}


	protected function validateRelations($nameClass, $relations)
	{
		$hasRelations = false;
		$strRelations = [];

		foreach ($relations as $relation => $info) {
			if($info['count']>0){
				$strRelations[] = $info['count'].' '.$relation;
				$hasRelations = true;
			}
		}

		if(!empty($strRelations)){
			session()->flash('deleteWithRelations', compact('nameClass','strRelations'));
		}
		return $hasRelations;
	}


	protected function button($row, $model, $route, $title, $class, $icon)
	{
		if(!\Route::has($route))
			$route = $this->route.'.'.$route;

		$keyname = $model->getKeyName();
		return \Html::link(route($route, [ $keyname => $row->$keyname ]), '<i class="'.$icon.' fa-fw" aria-hidden="true"></i>', [
			'class'=>'btn btn-xs btn-'.$class,
			'title'=>$title,
			'data-tooltip'=>'tooltip'
		],null,false);
	}


	protected function buttonShow($row, $model)
	{
		return $this->button($row, $model, 'show', 'Ver', 'default', 'fas fa-eye');
	}


	protected function buttonEdit($row, $model)
	{
		return $this->button($row, $model, 'edit', 'Editar', 'info', 'fas fa-edit');
	}


	protected function buttonDelete($row, $model, $modelDescrip)
	{
		if(\Entrust::hasRole(['owner', 'admin']))
			$keyname = $model->getKeyName();
			return \Form::button('<i class="fas fa-trash-alt fa-fw" aria-hidden="true"></i>',[
				'class'=>'btn btn-xs btn-danger btn-delete',
				'data-toggle'=>'modal',
				'data-id'=> $row->$keyname,
				'data-modelo'=> str_upperspace(class_basename($model)),
				'data-descripcion'=> $row->$modelDescrip,
				'data-action'=> route( $this->route.'.destroy', [ $keyname => $row->$keyname ]),
				'data-target'=>'#pregModalDelete',
				'data-tooltip'=>'tooltip',
				'title'=>'Borrar',
			]);
		return '';
	}

}
