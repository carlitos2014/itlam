<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Auditor
 * @package App\Models
 * @version February 14, 2019, 5:14 am UTC
 *
 * @property string nombre
 */
class Firma extends Model
{
    use SoftDeletes;

    public $table = 'firmas';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'cargo',
        'filename',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cargo' => 'string',
        'filename'  => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cargo' => 'required',
        'filename' => 'required|file',
    ];


}
