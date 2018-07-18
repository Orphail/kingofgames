<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public $guarded = ['_token'];

    public $rules = [
        'title' => 'required',
        'content' => 'required',
        'slug' => 'required|max:64|unique:pages'
    ];
}
