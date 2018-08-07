<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Tournament;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class InscriptionController extends Controller
{

    public function index($tournament_id, Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $tournament = Tournament::find($tournament_id);
        $inscriptions = Result::all();
        return view('kogcms.tournament.inscription.index', [
            'inscriptions' => $inscriptions,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($id)
    {
        $inscription = Result::find($id);
        $tournament = Tournament::find($inscription->tournament_id);
        $inscriptions = Result::where('tournament_id', $tournament->id)->get()->toArray();
        return view('kogcms.tournament.inscription.form', [
            'inscription' => $inscription,
            'route' => ['inscription.update', $tournament->id, $inscription],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
            'nicknamesUsed' => array_column($inscriptions, 'nickname'),
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $inscription = new Result();
        $inscriptions = Result::where('tournament_id', $tournament->id)->get()->toArray();
        return view('kogcms.tournament.inscription.form', [
            'inscription' => $inscription,
            'route' => ['inscription.store', $tournament->id],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
            'tournament' => $tournament,
            'nicknamesUsed' => array_column($inscriptions, 'nickname'),
        ]);
    }

    public function update($tournament_id, $inscription_id, Request $request)
    {
        $inscription = Result::find($inscription_id);
        $post = $request->all();
        $post['tournament_id'] = $tournament_id;
        $post['nickname'] = $request->get('nickname');
        $inscription->update($post);
        return redirect(route('inscription.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $post = $request->all();
        $inscription = new Result();
        $post['tournament_id'] = $tournament_id;
        $post['nickname'] =  $request->get('nickname');
        $inscription->create($post);
        return redirect(route('inscription.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy($id, Request $request)
    {
        try {
            $inscription = Result::find($id);
            $tournament_id = $inscription->tournament_id;
            $inscription->delete();
            return redirect(route('inscription.index', $tournament_id))
                ->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('inscription.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}