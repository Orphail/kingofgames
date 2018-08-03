<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Console extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    protected $visible = ['name'];

    public $rules = [
        'name' => 'required|max:191',
    ];

    public function videogames(){
        return $this->belongsToMany(Videogame::class);
    }
}


