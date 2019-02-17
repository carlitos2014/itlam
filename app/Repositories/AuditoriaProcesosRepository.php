<?php

namespace App\Repositories;

use App\Models\AuditoriaProcesos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditoriaProcesosRepository
 * @package App\Repositories
 * @version February 17, 2019, 10:23 pm UTC
 *
 * @method AuditoriaProcesos findWithoutFail($id, $columns = ['*'])
 * @method AuditoriaProcesos find($id, $columns = ['*'])
 * @method AuditoriaProcesos first($columns = ['*'])
*/
class AuditoriaProcesosRepository extends BaseRepository
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
        return AuditoriaProcesos::class;
    }
}
