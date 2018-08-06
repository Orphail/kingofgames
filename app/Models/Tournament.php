<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tournament extends Model
{
    protected $fillable = [
        'id',
        'name',
        'category',
        'date',
    ];

    public $rules = [
        'name' => 'required|max:191',
        'date' => 'required',
    ];

    public function tournamentDetails()
    {
        return $this->hasMany(TournamentDetail::class);
    }

    public function getAllCategories()
    {
        return [
            'KOGT' => 'King of Games Tournament',
            'KOGTT' => 'King of Games Tag Tournament',
            'KOGA' => 'King of Games Arcade',
            'KOGO' => 'King of Games Online',
            'Gamingmania' => 'Gamingmania'
        ];
    }
}


