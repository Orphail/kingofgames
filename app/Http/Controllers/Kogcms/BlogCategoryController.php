<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $blogCategories = BlogCategory::all();

        return view('kogcms.blog.category.index', [
            'blogCategories' => $blogCategories,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $blogCategory = BlogCategory::find($id);
        return view('kogcms.blog.category.form', [
            'blogCategory' => $blogCategory,
            'route' => ['blogCategory.update', $blogCategory],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $blogCategory = new BlogCategory();
        return view('kogcms.blog.category.form', [
            'blogCategory' => $blogCategory,
            'route' => ['blogCategory.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(BlogCategory $blogCategory, Request $request)
    {
        try {
            $rules = $blogCategory->rules;
            $this->validate($request, $rules);
            $blogCategory->update($request->all());
            return redirect(route('blogCategory.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('blogCategory.index'))->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $blogCategory = new BlogCategory();
            $this->validate($request, $blogCategory->rules);
            $post = $request->all();
            $blogCategory->create($post);
            return redirect(route('blogCategory.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('blogCategory.index'))->withMessage($exception->getMessage());
        }
    }


    public function destroy(BlogCategory $blogCategory, Request $request)
    {
        try {
            $blogCategory->delete();
            return redirect(route('blogCategory.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('blogCategory.index'))->withMessage($exception->getMessage());
        }
    }
}