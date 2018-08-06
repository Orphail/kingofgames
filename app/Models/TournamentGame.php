<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TournamentGame extends Model
{
    protected $fillable = [
        'id',
        'tournament_id',
        'videogame_id',
    ];

    public $rules = [
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }

    public function getAllVideogames()
    {
        return Videogame::pluck('title','id');
    }
}


