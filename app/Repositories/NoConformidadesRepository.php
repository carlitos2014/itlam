<?php

namespace App\Repositories;

use App\Models\NoConformidades;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NoConformidadesRepository
 * @package App\Repositories
 * @version January 3, 2019, 9:34 pm UTC
 *
 * @method NoConformidades findWithoutFail($id, $columns = ['*'])
 * @method NoConformidades find($id, $columns = ['*'])
 * @method NoConformidades first($columns = ['*'])
*/
class NoConformidadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'motivo',
        'grado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NoConformidades::class;
    }
}
