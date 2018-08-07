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

class TournamentGameController extends Controller
{

    public function index($tournament_id, Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $tournament = Tournament::find($tournament_id);
        $tournamentGames = Result::select('videogame')
            ->where('tournament_id', $tournament_id)
            ->where('videogame', '!=', null)
            ->groupBy('videogame')
            ->get();
        return view('kogcms.tournament.videogame.index', [
            'tournamentGames' => $tournamentGames,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($tournament_id, $videogame)
    {
        $tournament = Tournament::find($tournament_id);
        $tournamentGame = Result::where('tournament_id', $tournament_id)->where('videogame', $videogame)->first();
        $videogamesUsed = Result::where('tournament_id', $tournament_id)->get()->toArray();
        return view('kogcms.tournament.videogame.form', [
            'tournamentGame' => $tournamentGame,
            'route' => ['tournamentGame.update', $tournament_id, $tournamentGame->videogame],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
            'videogamesUsed' => array_column($videogamesUsed, 'videogame'),
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $tournamentGame = new Result();
        $videogamesUsed = Result::where('tournament_id', $tournament_id)->get()->toArray();
        return view('kogcms.tournament.videogame.form', [
            'tournamentGame' => $tournamentGame,
            'route' => ['tournamentGame.store', $tournament->id],
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
            $tournamentGame = Result::where('tournament_id', $tournament_id)
                ->where('videogame', $videogame)
                ->where('nickname', $inscription->nickname)->first();
            $tournamentGame->tournament_id = $tournament_id;
            $tournamentGame->nickname = $inscription->nickname;
            $tournamentGame->videogame = $request->get('videogame');
            $tournamentGame->save();
        }
        return redirect(route('tournamentGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $rs = Result::select('nickname')
            ->where('tournament_id', $tournament_id)
            ->groupBy('nickname')->get()->toArray();
        $inscriptions = array_column($rs, 'nickname');
        if (!empty($inscriptions)) {
            foreach ($inscriptions as $inscription) {
                $tournamentGame = new Result();
                $tournamentGame->tournament_id = $tournament_id;
                $tournamentGame->nickname = $inscription;
                $tournamentGame->videogame = $request->get('videogame');
                $tournamentGame->save();
            }
        } else {
            $tournamentGame = new Result();
            $tournamentGame->tournament_id = $tournament_id;
            $tournamentGame->nickname = null;
            $tournamentGame->videogame = $request->get('videogame');
            $tournamentGame->save();
        }
        $delete_results = Result::where('videogame', null)->get();
        if($delete_results){
            foreach($delete_results as $delete_result){
                $delete_result->delete();
            }
        }
        return redirect(route('tournamentGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
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
            return redirect(route('tournamentGame.index', $tournament_id))
                ->withMessage(trans('admin.delete_ok'));
        } catch (\Exception $exception) {
            return redirect(route('tournamentGame.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}