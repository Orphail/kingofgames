<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tag extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    protected $visible = ['name'];

    public $rules = [
        'name' => 'required|max:191',
    ];
}


