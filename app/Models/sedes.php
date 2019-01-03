<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sedes
 * @package App\Models
 * @version January 3, 2019, 5:09 pm UTC
 *
 * @property string nombre
 * @property string direccion
 * @property string telefono
 * @property string web
 * @property string email
 */
class sedes extends Model
{
    use SoftDeletes;

    public $table = 'sedes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'web',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'web' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'numeric',
        'email' => 'email'
    ];

    
}
