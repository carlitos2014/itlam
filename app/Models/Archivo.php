<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //Nombre de la tabla en la base de datos
	protected $table = 'archivos';


	protected $fillable = [
		'nombre',
		'ruta',
		
	];

	public static function rules($id = 0){
		return [
			'nombre'    => ['required','max:100','unique:nombre'],
			'ruta' => ['required','max:100'],
			
		];
	}

	public function auditorias()
	{
		//return $this->hasMany(Auditoria::class);
	}
}
