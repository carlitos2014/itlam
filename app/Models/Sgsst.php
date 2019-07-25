<?php

namespace App\Models;

use Eloquent as Model;
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

    public static $rules = [
		'name' =>['required', 'max:100'],
		'description' => ['required','max:1000'],
		
	];
}