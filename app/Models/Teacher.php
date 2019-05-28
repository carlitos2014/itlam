<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Auditoria
 * @package App\Models
 * @version January 24, 2019, 11:52 pm UTC
 *
 * @property date fecha
 * @property string lugar
 * @property string objetivos
 * @property string alcances
 * @property string criterios
 * @property string observaciones
 */
class Teacher extends Model
{
    use SoftDeletes;
    public $table = 'teachers';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'sede_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => ['required','max:100'],
        'apellidos' => ['required','max:100'],
        'sede_id' => ['required'],
    ];


    public function sede()
    {
        return $this->belongsTo(sedes::class);
    }



    
}
