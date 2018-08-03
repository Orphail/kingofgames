<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RankController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';

        $ranks = Rank::all();

        return view('kogcms.rank.index', [
            'ranks' => $ranks,
            'sort' => $field,
            'desc' => $desc
        ]);
    }

    public function edit($id)
    {
        $rank = Rank::find($id);
        return view('kogcms.rank.form', [
            'rank' => $rank,
            'route' => ['rank.update', $rank],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit')
        ]);
    }

    public function create()
    {
        $rank = new Rank();
        return view('kogcms.rank.form', [
            'rank' => $rank,
            'route' => ['rank.store'],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create')
        ]);
    }

    public function update(Rank $rank, Request $request)
    {
        try {
            $rules = $rank->rules;
            $this->validate($request, $rules);
            $rank->update($request->all());
            return redirect(route('rank.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('rank.index'))->withMessage($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $rank = new Rank();
            $this->validate($request, $rank->rules);
            $post = $request->all();
            $rank->create($post);
            return redirect(route('rank.index'))->withMessage(trans('admin.insert_ok'));
        } catch (\Exception $exception) {
            return redirect(route('rank.index'))->withMessage($exception->getMessage());
        }
    }


    public function destroy(Rank $rank, Request $request)
    {
        try {
            $rank->delete();
            return redirect(route('rank.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('rank.index'))->withMessage($exception->getMessage());
        }
    }
}