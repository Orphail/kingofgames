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
        'videogame',
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

    public function getTotalScore($tournament_id, $nickname)
    {
        return Result::where('tournament_id', $tournament_id)->where('nickname', $nickname)->sum('score');
    }

    public function getChampion($tournament_id, $videogame)
    {
        $rs = Result::where('tournament_id', $tournament_id)
            ->where('videogame', $videogame)
            ->where('score', '!=', null)
            ->orderBy('score', 'desc');
        if ($rs->count()) {
            return '<b>'.$rs->first()->nickname.'</b>';
        } else {
            return '<i>Ninguno</i>';
        }
    }
}


