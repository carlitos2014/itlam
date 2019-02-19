<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Auditor
 * @package App\Models
 * @version February 14, 2019, 5:14 am UTC
 *
 * @property string nombre
 */
class Auditor extends Model
{
    use SoftDeletes;

    public $table = 'auditores';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class);
    }

    public function auditoriasInternas()
    {
        return $this->belongsToMany(Auditoria::class, 'auditorias_auditores');
    }
}
