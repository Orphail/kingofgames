<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Videogame extends Model
{
    protected $fillable = [
        'id',
        'title',
        'players',
        'genre_id',
    ];

    protected $visible = ['name'];

    public $rules = [
        'title' => 'required|max:191',
        'players' => 'required|max:191',
    ];

    public function numberPlayers()
    {
        return [
          '1' => '1',
          '1-2' => '1-2',
          '1-4' => '1-4',
          '+4' => '+4'
        ];
    }

    public function consoles(){
        return $this->belongsToMany(Console::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function getAllGenres() {
        return Genre::pluck('name','id');
    }
    public function getAllConsoles() {
        return Console::pluck('name','id');
    }
}


