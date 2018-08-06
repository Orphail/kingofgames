<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TournamentController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $tournaments = Tournament::all();

        return view('kogcms.tournament.index', [
            'tournaments' => $tournaments,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $tournament = Tournament::find($id);
        return view('kogcms.tournament.form', [
            'tournament' => $tournament,
            'route' => ['tournament.update', $tournament],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $tournament = new Tournament();
        return view('kogcms.tournament.form', [
            'tournament' => $tournament,
            'route' => ['tournament.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Tournament $tournament, Request $request)
    {
        try {
            $request->offsetSet('date', Carbon::createFromFormat('d/m/Y', $request->get('date'))->format('Y-m-d'));
            $rules = $tournament->rules;
            $this->validate($request, $rules);
            $tournament->update($request->all());
            return redirect(route('tournament.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $tournament = new Tournament();
            $request->offsetSet('date', Carbon::createFromFormat('d/m/Y', $request->get('date'))->format('Y-m-d'));
            $this->validate($request, $tournament->rules);
            $tournament->create($request->all());
            return redirect(route('tournament.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }


    public function destroy(Tournament $tournament, Request $request)
    {
        try {
            $tournament->delete();
            return redirect(route('tournament.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('tournament.index'))->withMessage($exception->getMessage());
        }
    }
}