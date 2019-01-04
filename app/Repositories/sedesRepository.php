<?php

namespace App\Repositories;

use App\Models\sedes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sedesRepository
 * @package App\Repositories
 * @version January 3, 2019, 5:09 pm UTC
 *
 * @method sedes findWithoutFail($id, $columns = ['*'])
 * @method sedes find($id, $columns = ['*'])
 * @method sedes first($columns = ['*'])
*/
class sedesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion',
        'telefono',
        'web',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sedes::class;
    }
}
