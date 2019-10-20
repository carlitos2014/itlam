<?php

namespace App\Repositories;

use App\Models\Proceso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProcesosRepository
 * @package App\Repositories
 * @version February 17, 2019, 4:51 pm UTC
 *
 * @method Proceso findWithoutFail($id, $columns = ['*'])
 * @method Proceso find($id, $columns = ['*'])
 * @method Proceso first($columns = ['*'])
*/
class ProcesosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'responsable'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proceso::class;
    }
}
