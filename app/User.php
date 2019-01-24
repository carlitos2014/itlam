<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function rules($id = 0){
        return [
            'name'      => 'required|max:255|unique:users',
            'email'     => ['required','email','max:320','unique:users'],
            'username'  => $id!=0 ? '' : ['required','max:15','unique:users'],
            //'roles_ids' => 'required|array',
            'password'  => $id!=0 ? '' : 'required|min:6|confirmed',//regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
        ];
    }

}
