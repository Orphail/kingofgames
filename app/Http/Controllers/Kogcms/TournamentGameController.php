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
        $tournamentGames = Result::all();
        return view('kogcms.tournament.videogame.index', [
            'tournamentGames' => $tournamentGames,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($id)
    {
        $tournamentGame = Result::find($id);
        $tournament = Tournament::find($tournamentGame->tournament_id);
        return view('kogcms.tournament.videogame.form', [
            'tournamentGame' => $tournamentGame,
            'route' => ['tournamentGame.update', $tournament->id, $tournamentGame],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $tournamentGame = new Result();
        return view('kogcms.tournament.videogame.form', [
            'tournamentGame' => $tournamentGame,
            'route' => ['tournamentGame.store', $tournament->id],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
            'tournament' => $tournament,
        ]);
    }

    public function update($tournament_id, $tournamentGame_id, Request $request)
    {
        $tournamentGame = Result::find($tournamentGame_id);
        $post = $request->all();
        $post['tournament_id'] = $tournament_id;
        $post['videogame_id'] = $tournamentGame_id;
        $tournamentGame->update($post);
        return redirect(route('tournamentGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $post = $request->all();
        $tournamentGame = new Result();
        $post['tournament_id'] = $tournament_id;
        $post['videogame_id'] = $request->get('videogame_id');
        $tournamentGame->create($post);
        return redirect(route('tournamentGame.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy($id, Request $request)
    {
        try {
            $tournamentGame = Result::find($id);
            $tournament_id = $tournamentGame->tournament_id;
            $tournamentGame->delete();
            return redirect(route('tournamentGame.index', $tournament_id))
                ->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('tournamentGame.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}