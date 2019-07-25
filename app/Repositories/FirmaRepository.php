<?php

namespace App\Repositories;

use App\Models\Firma;
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
class FirmaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cargo',
        'filename',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Firma::class;
    }
}
