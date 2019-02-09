<?php

namespace App\Repositories;

use App\Models\Auditoria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditoriaRepository
 * @package App\Repositories
 * @version January 24, 2019, 11:52 pm UTC
 *
 * @method Auditoria findWithoutFail($id, $columns = ['*'])
 * @method Auditoria find($id, $columns = ['*'])
 * @method Auditoria first($columns = ['*'])
*/
class AuditoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'lugar',
        'objetivos',
        'alcances',
        'criterios',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Auditoria::class;
    }
}
