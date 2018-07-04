<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    use Translatable;

    public $translatedAttributes = ['title','content'];

    public $guarded = ['_token'];

    public $rules = [
        'es.title' => 'required',
        'es.content' => 'required',
        'slug' => 'required|max:64|unique:pages'
    ];
}
