<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proceso
 * @package App\Models
 * @version February 17, 2019, 4:51 pm UTC
 *
 * @property string nombre
 * @property string responsable
 */
class Proceso extends Model
{
    use SoftDeletes;

    public $table = 'procesos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'responsable',
        'email',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'responsable' => 'string',
        'email' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required,max:100',
        'responsable' => 'required,max:100',
        'email' => 'required,email,max:320',
    ];

    

    public function auditorias()
    {
        return $this->hasMany(AuditoriaProceso::class);
    }
    
}
