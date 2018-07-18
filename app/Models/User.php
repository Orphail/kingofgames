<?php

namespace App\Models;

use App\Models\Customer;

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
        'name', 'email', 'password','active','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = ['name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8|max:16|alpha_dash'];

}
