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
        $inscriptions = Result::select('nickname')
            ->where('tournament_id', $tournament_id)
            ->where('nickname', '!=', null)
            ->groupBy('nickname')->get();
        return view('kogcms.tournament.inscription.index', [
            'inscriptions' => $inscriptions,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($tournament_id, $nickname)
    {
        $tournament = Tournament::find($tournament_id);
        $inscription = Result::where('tournament_id', $tournament_id)->where('nickname', $nickname)->first();
        $nicknamesUsed = Result::where('tournament_id', $tournament_id)->get()->toArray();
        return view('kogcms.tournament.inscription.form', [
            'inscription' => $inscription,
            'route' => ['inscription.update', $tournament_id, $nickname],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
            'nicknamesUsed' => array_column($nicknamesUsed, 'nickname'),
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $inscription = new Result();
        $nicknamesUsed = Result::where('tournament_id', $tournament->id)->get()->toArray();
        return view('kogcms.tournament.inscription.form', [
            'inscription' => $inscription,
            'route' => ['inscription.store', $tournament->id],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
            'tournament' => $tournament,
            'nicknamesUsed' => array_column($nicknamesUsed, 'nickname'),
        ]);
    }

    public function update($tournament_id, $nickname, Request $request)
    {
        $videogames = Result::where('tournament_id', $tournament_id)
            ->where('nickname', $nickname)->get();
        $post = $request->all();
        foreach ($videogames as $videogame) {
            $post['tournament_id'] = $tournament_id;
            $post['nickname'] = $request->get('nickname');
            $videogame->update($post);
        }
//        $inscription = Result::find($inscription_id);
//        $this->validate($request, $inscription->rules);
        return redirect(route('inscription.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $rs = Result::select('videogame')
            ->where('tournament_id', $tournament_id)
            ->groupBy('videogame')->get()->toArray();
        $videogames = array_column($rs, 'videogame');

        if (!empty($videogames)) {
            foreach ($videogames as $videogame) {
                $inscription = new Result();
                $inscription->tournament_id = $tournament_id;
                $inscription->nickname = $request->get('nickname');
                $inscription->videogame = $videogame;
                $inscription->save();
            }
        } else {
            $inscription = new Result();
            $inscription->tournament_id = $tournament_id;
            $inscription->nickname = $request->get('nickname');
            $inscription->videogame = null;
            $inscription->save();
        }
        $delete_results = Result::where('nickname', null)->get();
        if ($delete_results) {
            foreach ($delete_results as $delete_result) {
                $delete_result->delete();
            }
        }
        return redirect(route('inscription.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }

    public function destroy($tournament_id, $nickname, Request $request)
    {
        try {
            $inscriptions = Result::where('tournament_id', $tournament_id)->where('nickname', $nickname)->get();
            foreach ($inscriptions as $inscription) {
                $videogames = Result::where('tournament_id', $tournament_id)->where('videogame', $inscription->videogame)->get();
                if ($videogames->count() > 1 || ($videogames->count() == 1 && $inscription->videogame == null)) {
                    $inscription->delete();
                } else {
                    $inscription->nickname = null;
                    $inscription->save();
                }
            }
            return redirect(route('inscription.index', $tournament_id))
                ->withMessage(trans('admin.delete_ok'));
        } catch (\Exception $exception) {
            return redirect(route('inscription.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}