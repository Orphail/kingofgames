<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TournamentPlayer extends Model
{
    protected $fillable = [
        'id',
        'tournament_id',
        'player_id',
    ];

    public $rules = [
    ];

    public function tournaments()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllUsers()
    {
        return User::pluck('nickname','id');
    }
}


