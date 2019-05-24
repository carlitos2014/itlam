<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sgsst extends Model
{
    //Nombre de la tabla en la base de datos
	protected $table = 'sgsst_inecesarios';


	protected $fillable = [
		'ruta',
		
	];

	public static function rules($id = 0){
		return [
			'ruta' => ['required','max:100'],
			
		];
	}
}
