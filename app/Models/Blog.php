<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'blog_category_id',
        'author',
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

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function allBlogCategories()
    {
        return BlogCategory::pluck('name', 'id');
    }

    public function allTags()
    {
        return Tag::pluck('name', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getAllAuthors()
    {
        return Admin::pluck('nickname', 'id');
    }
}
