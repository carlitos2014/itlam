<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AuditoriaProceso
 * @package App\Models
 * @version February 17, 2019, 10:23 pm UTC
 *
 * @property date fecha
 * @property time hora_inicio
 * @property time hora_fin
 * @property unsignedInteger proceso_id
 * @property unsignedInteger auditor_id
 */
class AuditoriaProceso extends Model
{
    use SoftDeletes;

    public $table = 'auditoria_procesos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'auditoria_id',
        'proceso_id',
        'auditor_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
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
        'auditoria_id' => 'required',
        'proceso_id' => 'required',
        'auditor_id' => 'required'
    ];

    public function auditoria()
    {
        return $this->belongsTo(Auditoria::class);
    }

    public function auditor()
    {
        return $this->belongsTo(Auditor::class);
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }


    
}
