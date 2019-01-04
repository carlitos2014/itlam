<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NoConformidades
 * @package App\Models
 * @version January 3, 2019, 9:34 pm UTC
 *
 * @property string nombre
 * @property string motivo
 * @property integer grado
 */
class NoConformidades extends Model
{
    use SoftDeletes;

    public $table = 'no_conformidades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'motivo',
        'grado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'motivo' => 'string',
        'grado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'motivo' => 'required',
        'grado' => 'required'
    ];

    
}
