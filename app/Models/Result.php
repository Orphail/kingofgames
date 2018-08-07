<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Result extends Model
{
    protected $fillable = [
        'id',
        'tournament_id',
        'videogame_id',
        'nickname',
        'score',
        'evaluation'
    ];

    public $rules = [
        'nickname' => 'required|unique:results'
    ];

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function getAllUsers()
    {
        return User::pluck('nickname', 'id');
    }

    public function getAllVideogames()
    {
        return Videogame::pluck('title', 'id');
    }

}


