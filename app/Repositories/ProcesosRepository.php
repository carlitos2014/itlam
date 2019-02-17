<?php

namespace App\Repositories;

use App\Models\Procesos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProcesosRepository
 * @package App\Repositories
 * @version February 17, 2019, 4:51 pm UTC
 *
 * @method Procesos findWithoutFail($id, $columns = ['*'])
 * @method Procesos find($id, $columns = ['*'])
 * @method Procesos first($columns = ['*'])
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
        return Procesos::class;
    }
}
