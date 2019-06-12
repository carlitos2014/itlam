<?php

namespace App\Models;

use App\Traits\ModelRulesTrait;
use App\Traits\RelationshipsTrait;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, ModelRulesTrait, RelationshipsTrait; #,AuditableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'password', 'remember_token',
    ];
    
    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules($id = 0){
        return [
            'name'      => 'required|max:255|'.static::unique($id,'name'),
            'email'     => ['required','email','max:320',static::unique($id,'email')],
            'username'  => $id!=0 ? '' : ['required','max:15',static::unique($id,'username')],
            //'roles_ids' => 'required|array',
            'password'  => $id!=0 ? '' : 'required|min:6|confirmed',//regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
        ];
    }

    /**
     * Relations with roles
     * 
     * @return Collection
     */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function teacher(){

        return $this-> hasOne(Teacher::class);
    }

}
