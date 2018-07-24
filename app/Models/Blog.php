<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'blog_category_id',
        'tags',
        'title',
        'summary',
        'description',
        'status',
        'post_date',
    ];

    public $guarded = ['_token'];

    public $rules = [
        'title' => 'required',
        'summary' => 'required',
        'description' => 'required',
    ];

    public function getAllStatus()
    {
        return [
          'Borrador', 'Publicado', 'Programado', 'Descartado'
        ];
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function categoryName($id)
    {
        return BlogCategory::find($id)->name;
    }

    public function allBlogCategories()
    {
        return BlogCategory::pluck('name', 'id');
    }

    public function allTags()
    {
        return Tag::pluck('name', 'id');
    }

}
