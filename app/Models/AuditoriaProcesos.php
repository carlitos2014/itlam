<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AuditoriaProcesos
 * @package App\Models
 * @version February 17, 2019, 10:23 pm UTC
 *
 * @property date fecha
 * @property time hora_inicio
 * @property time hora_fin
 * @property unsignedInteger proceso_id
 * @property unsignedInteger auditor_id
 */
class AuditoriaProcesos extends Model
{
    use SoftDeletes;

    public $table = 'auditoria_procesos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'proceso_id',
        'auditor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'proceso_id' => 'required',
        'auditor_id' => 'required'
    ];

    
}
