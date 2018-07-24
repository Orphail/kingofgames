<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $tags = Tag::all();

        return view('kogcms.blog.tag.index', [
            'tags' => $tags,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('kogcms.blog.tag.form', [
            'tag' => $tag,
            'route' => ['tag.update', $tag],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $tag = new Tag();
        return view('kogcms.blog.tag.form', [
            'tag' => $tag,
            'route' => ['tag.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Tag $tag, Request $request)
    {
        try {
            $rules = $tag->rules;
            $this->validate($request, $rules);
            $tag->update($request->all());
            return redirect(route('tag.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('tag.index'))->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $tag = new Tag();
            $this->validate($request, $tag->rules);
            $post = $request->all();
            $tag->create($post);
            return redirect(route('tag.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('tag.index'))->withMessage($exception->getMessage());
        }
    }


    public function destroy(Tag $tag, Request $request)
    {
        try {
            $tag->delete();
            return redirect(route('tag.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('tag.index'))->withMessage($exception->getMessage());
        }
    }
}