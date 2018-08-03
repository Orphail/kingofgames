<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    public function show()
    {
        //
    }

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $blogs = Blog::all();

        return view('kogcms.blog.index', ['blogs' => $blogs, 'sort' => $field, 'desc' => $desc]);
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $tags = $blog->allTags();

        return view('kogcms.blog.form', [
            'blog' => $blog,
            'tags' => $tags,
            'route' => ['blog.update', $blog],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
        ]);
    }

    public function create()
    {
        $blog = new Blog();
        $tags = $blog->allTags();

        return view('kogcms.blog.form', [
            'blog' => $blog,
            'tags' => $tags,
            'route' => ['blog.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
        ]);
    }

    public function update(Blog $blog, Request $request)
    {
        $rules = $blog->rules;
        $post = $request->all();
        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;
        if ($blog->link && !(preg_match('~^https?://~i', $post['link']))) {
            $post['link'] = 'https://' . $post['link'];
        }

        $this->validate($request, $rules);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store($blog->id, 'public');
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                unlink(public_path('uploads/' . $blog->image));
            }
            $post['image'] = $file;
        }
        if (array_key_exists('delete_image', $post)) {
            $post['image'] = null;
        }
        $post['tags'] = $request->get('tags') ? json_encode($post['tags']) : null;
        $post['author_id'] = $request->get('author_id') ? $request->get('author_id') : $request->session()->get('admin_id');
        $blog->update($post);
        return redirect(route('blog.index'))->withMessage(trans('admin.insert_ok'));
    }


    public function store(Request $request)
    {
        $blog = new Blog();
        $rules = $blog->rules;
        $post = $request->all();
        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;

        $this->validate($request, $rules);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store($blog->id, 'public');
            $post['image'] = $file;
        }
        $post['tags'] = $request->get('tags') ? json_encode($post['tags']) : null;
        $post['author_id'] = $request->get('author_id') ? $request->get('author_id') : $request->session()->get('admin_id');
        $blog->create($post);
        return redirect(route('blog.index'))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy(Blog $blog, Request $request)
    {
        try {
            $blog->delete();
            return redirect(route('blog.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('blog.index'))->withMessage($exception->getMessage());
        }
    }
}