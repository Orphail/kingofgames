<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Result extends Model
{
    protected $fillable = [
        'id',
        'tournament_game_id',
        'tournament_player_id',
        'score',
        'evaluation'
    ];

    public $rules = [
    ];

    public function tournamentGames()
    {
        return $this->belongsTo(TournamentGame::class);
    }

    public function tournamentPlayers()
    {
        return $this->belongsTo(TournamentPlayer::class);
    }
}


