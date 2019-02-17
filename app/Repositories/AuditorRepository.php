<?php

namespace App\Repositories;

use App\Models\Auditor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditorRepository
 * @package App\Repositories
 * @version February 14, 2019, 5:14 am UTC
 *
 * @method Auditor findWithoutFail($id, $columns = ['*'])
 * @method Auditor find($id, $columns = ['*'])
 * @method Auditor first($columns = ['*'])
*/
class AuditorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Auditor::class;
    }
}
