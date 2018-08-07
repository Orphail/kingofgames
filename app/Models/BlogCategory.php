<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = [
        'id',
        'name'
    ];

    protected $visible = ['name'];

    public $rules = [
        'name' => 'required|max:191',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}


