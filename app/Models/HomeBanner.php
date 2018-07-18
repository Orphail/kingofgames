<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HomeBanner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'active',
        'order',
        'text',
        'link'
    ];

    protected $visible = ['title', 'image', 'active', 'order'];

    public $rules = [
        'title' => 'required|max:191',
        'link' => 'url|max:191|nullable',
        'image' => 'image:jpg,png',
        'active' => 'boolean',
        'order' => 'integer',
    ];

    public $thumbnails = [
        'image'
    ];
}


