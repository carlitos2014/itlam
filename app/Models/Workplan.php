<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
     //Nombre de la tabla en la base de datos
	protected $table = 'workplans';


	protected $fillable = [
		'ruta',
		
	];

	public static function rules($id = 0){
		return [
			'ruta' => ['required','max:100'],
			
		];
	}
}
