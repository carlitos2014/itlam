<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPlaneacionPlan40 extends Model
{
    protected $table = 'academicPlaneacionPlan40';


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
}
