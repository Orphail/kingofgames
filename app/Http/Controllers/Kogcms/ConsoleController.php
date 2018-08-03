<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ConsoleController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $consoles = Console::all();

        return view('kogcms.console.index', [
            'consoles' => $consoles,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $console = Console::find($id);
        return view('kogcms.console.form', [
            'console' => $console,
            'route' => ['console.update', $console],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $console = new Console();
        return view('kogcms.console.form', [
            'console' => $console,
            'route' => ['console.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Console $console, Request $request)
    {
        try {
            $rules = $console->rules;
            $this->validate($request, $rules);
            $console->update($request->all());
            return redirect(route('console.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('console.index'))->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $console = new Console();
            $this->validate($request, $console->rules);
            $post = $request->all();
            $console->create($post);
            return redirect(route('console.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('console.index'))->withMessage($exception->getMessage());
        }
    }


    public function destroy(Console $console, Request $request)
    {
        try {
            $console->delete();
            return redirect(route('console.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('console.index'))->withMessage($exception->getMessage());
        }
    }
}