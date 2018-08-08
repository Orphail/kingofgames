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
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KogGameController extends Controller
{

    public function index($tournament_id, Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $tournament = Tournament::find($tournament_id);
        $kogGames = Result::select('videogame')
            ->where('tournament_id', $tournament_id)
            ->where('videogame', '!=', null)
            ->groupBy('videogame')
            ->get();
        return view('kogcms.tournament.videogame.index', [
            'kogGames' => $kogGames,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($tournament_id, $videogame)
    {
        $tournament = Tournament::find($tournament_id);
        $kogGame = Result::where('tournament_id', $tournament_id)->where('videogame', $videogame)->first();
        $videogamesUsed = Result::where('tournament_id', $tournament_id)->get()->toArray();
        return view('kogcms.tournament.videogame.form', [
            'kogGame' => $kogGame,
            'route' => ['kogGame.update', $tournament_id, $kogGame->videogame],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
            'videogamesUsed' => array_column($videogamesUsed, 'videogame'),
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $kogGame = new Result();
        $videogamesUsed = Result::where('tournament_id', $tournament_id)->get()->toArray();
        return view('kogcms.tournament.videogame.form', [
            'kogGame' => $kogGame,
            'route' => ['kogGame.store', $tournament->id],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
            'tournament' => $tournament,
            'videogamesUsed' => array_column($videogamesUsed, 'videogame'),
        ]);
    }

    public function update($tournament_id, $videogame, Request $request)
    {
        $inscriptions = Result::where('tournament_id', $tournament_id)
            ->where('videogame', $videogame)->get();
        foreach ($inscriptions as $inscription) {
            $kogGame = Result::where('tournament_id', $tournament_id)
                ->where('videogame', $videogame)
                ->where('nickname', $inscription->nickname)->first();
            $kogGame->tournament_id = $tournament_id;
            $kogGame->nickname = $inscription->nickname;
            $kogGame->videogame = $request->get('videogame');
            $kogGame->save();
        }
        return redirect(route('kogGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $rs = Result::select('nickname')
            ->where('tournament_id', $tournament_id)
            ->groupBy('nickname')->get()->toArray();
        $inscriptions = array_column($rs, 'nickname');
        if (!empty($inscriptions)) {
            foreach ($inscriptions as $inscription) {
                $kogGame = new Result();
                $kogGame->tournament_id = $tournament_id;
                $kogGame->nickname = $inscription;
                $kogGame->videogame = $request->get('videogame');
                $kogGame->save();
            }
        } else {
            $kogGame = new Result();
            $kogGame->tournament_id = $tournament_id;
            $kogGame->nickname = null;
            $kogGame->videogame = $request->get('videogame');
            $kogGame->save();
        }
        $delete_results = Result::where('videogame', null)->get();
        if($delete_results){
            foreach($delete_results as $delete_result){
                $delete_result->delete();
            }
        }
        return redirect(route('kogGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }

    public function destroy($tournament_id, $videogame, Request $request)
    {
        try {
            $videogames = Result::where('tournament_id', $tournament_id)->where('videogame', $videogame)->get();
            foreach ($videogames as $videogame) {
                $inscriptions = Result::where('tournament_id', $tournament_id)->where('nickname', $videogame->nickname)->get();
                if($inscriptions->count() > 1 || ($inscriptions->count() == 1 && $videogame->nickname == null)) {
                    $videogame->delete();
                } else {
                    $videogame->videogame = null;
                    $videogame->save();
                }
            }
            return redirect(route('kogGame.index', $tournament_id))
                ->withMessage(trans('admin.delete_ok'));
        } catch (\Exception $exception) {
            return redirect(route('kogGame.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}