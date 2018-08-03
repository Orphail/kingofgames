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
        'nickname',
        'email',
        'rank_id',
        'password',
        'newsletter',
        'image',
        'disabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $rules = [
        'nickname' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8|max:16|alpha_dash',
        'image' => 'image'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function videogames()
    {
        return $this->belongsToMany(Videogame::class);
    }

    public function getAllRanks()
    {
        return Rank::pluck('name','id');
    }

}
