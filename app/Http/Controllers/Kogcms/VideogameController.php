<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VideogameController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $videogames = Videogame::all();

        return view('kogcms.videogame.index', [
            'videogames' => $videogames,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $videogame = Videogame::find($id);
        $consoles = [];
        if ($videogame->consoles) {
            foreach ($videogame->consoles as $console) {
                $consoles[$console->id] = $console->name;
            }
        }
        return view('kogcms.videogame.form', [
            'videogame' => $videogame,
            'route' => ['videogame.update', $videogame],
            'method' => 'PATCH',
            'consoles' => $consoles,
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $videogame = new Videogame();
        return view('kogcms.videogame.form', [
            'videogame' => $videogame,
            'route' => ['videogame.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Videogame $videogame, Request $request)
    {
        try {
            $rules = $videogame->rules;
            $this->validate($request, $rules);
            $videogame->update($request->all());
            $videogame->consoles()->sync($request->get('consoles'));
            return redirect(route('videogame.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $videogame = new Videogame();
            $this->validate($request, $videogame->rules);
            $videogame->create($request->all());
            $videogame->consoles()->sync($request->get('consoles'));
            return redirect(route('videogame.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }


    public function destroy(Videogame $videogame, Request $request)
    {
        try {
            $videogame->delete();
            return redirect(route('videogame.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('videogame.index'))->withMessage($exception->getMessage());
        }
    }
}