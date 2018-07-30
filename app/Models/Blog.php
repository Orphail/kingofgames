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

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorName()
    {
        return User::find($this->author)->name;
    }

    public function getAllAuthors()
    {
        return User::where('admin', true)->pluck('name', 'id');
    }
}
