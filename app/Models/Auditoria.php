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
class Auditoria extends Model
{
    use SoftDeletes;

    public $table = 'auditorias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'lugar',
        'objetivos',
        'alcances',
        'criterios',
        'observaciones',
        'auditor_lider_id',
        'fecha_apertura',
        'lugar_apertura',
        'fecha_cierre',
        'lugar_cierre',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date',
        'lugar' => 'string',
        'objetivos' => 'string',
        'alcances' => 'string',
        'criterios' => 'string',
        'observaciones' => 'string',
        'fecha_apertura' => 'date',
        'lugar_apertura' => 'string',
        'fecha_cierre' => 'date',
        'lugar_cierre' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => ['required'],
        'lugar' => ['required','max:100'],
        'auditor_lider_id' => ['required'],
        'auditoresInternos' => ['array'],
        'objetivos' => ['required','max:3000'],
        'alcances' => ['required','max:3000'],
        'criterios' => ['required','max:3000'],
        'observaciones' => ['max:3000'],
        'fecha_apertura' => ['required','date'],
        'lugar_apertura' => ['required','max:100'],
        'fecha_cierre' => ['required','date'],
        'lugar_cierre' => ['required','max:100'],
    ];


    public function auditorLider()
    {
        return $this->belongsTo(Auditor::class);
    }

    public function auditoresInternos()
    {
        return $this->belongsToMany(Auditor::class, 'auditorias_auditores');
    }


    public function procesos()
    {
        return $this->hasMany(AuditoriaProceso::class);
    }
    
}
