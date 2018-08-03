<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GenreController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $genres = Genre::all();

        return view('kogcms.genre.index', [
            'genres' => $genres,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('kogcms.genre.form', [
            'genre' => $genre,
            'route' => ['genre.update', $genre],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $genre = new Genre();
        return view('kogcms.genre.form', [
            'genre' => $genre,
            'route' => ['genre.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Genre $genre, Request $request)
    {
        try {
            $rules = $genre->rules;
            $this->validate($request, $rules);
            $genre->update($request->all());
            return redirect(route('genre.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('genre.index'))->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $genre = new Genre();
            $this->validate($request, $genre->rules);
            $post = $request->all();
            $genre->create($post);
            return redirect(route('genre.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('genre.index'))->withMessage($exception->getMessage());
        }
    }


    public function destroy(Genre $genre, Request $request)
    {
        try {
            $genre->delete();
            return redirect(route('genre.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('genre.index'))->withMessage($exception->getMessage());
        }
    }
}