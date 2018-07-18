<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'blog_category_id',
        'link',
        'title',
        'summary',
        'description',
        'SEO'
    ];

    public $guarded = ['_token'];

    public $rules = [
        'title' => 'required',
        'summary' => 'required',
        'description' => 'required',
        'link' => 'nullable|url',
    ];

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

}
