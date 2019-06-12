<?php

namespace App\Repositories;

use App\Models\Asignacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TeacherRepository
 * @package App\Repositories
 * @version January 24, 2019, 11:52 pm UTC
 *
 * @method Asignacion findWithoutFail($id, $columns = ['*'])
 * @method Asignacion find($id, $columns = ['*'])
 * @method Asignacion first($columns = ['*'])
*/
class AsignacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'observacion',
        'ruta',
        'teacher_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asignacion::class;
    }
}
