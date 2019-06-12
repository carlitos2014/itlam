<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //Nombre de la tabla en la base de datos
	protected $table = 'asignaciones';


	protected $fillable = [
        'observacion',
        'ruta',
        'teacher_id',		
	];

	public static $rules = [
		'observacion' =>['required', 'max:100'],
		'ruta' => ['required',],			
		'teacher_id' => ['required','max:1000'],
	];

	public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
