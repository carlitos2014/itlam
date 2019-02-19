<?php

namespace App\Repositories;

use App\Models\AuditoriaProceso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditoriaProcesoRepository
 * @package App\Repositories
 * @version February 17, 2019, 10:23 pm UTC
 *
 * @method AuditoriaProceso findWithoutFail($id, $columns = ['*'])
 * @method AuditoriaProceso find($id, $columns = ['*'])
 * @method AuditoriaProceso first($columns = ['*'])
*/
class AuditoriaProcesoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'proceso_id',
        'auditor_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AuditoriaProceso::class;
    }
}
