<?php

namespace App\Repositories;

use App\Models\Sgsst;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SgsstRepository
 * @package App\Repositories
 * @version January 24, 2019, 11:52 pm UTC
 *
 * @method Sgsst findWithoutFail($id, $columns = ['*'])
 * @method Sgsst find($id, $columns = ['*'])
 * @method Sgsst first($columns = ['*'])
*/
class SgsstRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'description',
        'ruta'        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sgsst::class;
    }
}
