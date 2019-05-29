<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sgsst extends Model
{
	//use SoftDeletes;
    //Nombre de la tabla en la base de datos
	protected $table = 'sgsst';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'nombre',
		'description',
		'ruta',
	];

	public static function rules($id = 0){
		return [
			
			'name' =>['required', 'max:100'],
			'description' => ['required','max:1024'],
			'ruta' => ['required','max:100','file','max:2048'],
			
		];
	}
}
