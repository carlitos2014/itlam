<?php

namespace App\Repositories;

use App\Models\Teacher;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TeacherRepository
 * @package App\Repositories
 * @version January 24, 2019, 11:52 pm UTC
 *
 * @method Teacher findWithoutFail($id, $columns = ['*'])
 * @method Teacher find($id, $columns = ['*'])
 * @method Teacher first($columns = ['*'])
*/
class TeacherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Teacher::class;
    }
}
