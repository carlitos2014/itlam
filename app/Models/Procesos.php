<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Procesos
 * @package App\Models
 * @version February 17, 2019, 4:51 pm UTC
 *
 * @property string nombre
 * @property string responsable
 */
class Procesos extends Model
{
    use SoftDeletes;

    public $table = 'procesos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'responsable'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'responsable' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required,max:100',
        'responsable' => 'required,max:100'
    ];

    

    public function auditorias()
    {
        return $this->hasMany(AuditoriaProceso::class);
    }
    
}
