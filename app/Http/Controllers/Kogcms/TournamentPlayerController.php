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
use App\Models\TournamentPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TournamentPlayerController extends Controller
{

    public function index($tournament_id, Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $tournament = Tournament::find($tournament_id);
        $tournamentPlayers = TournamentPlayer::all();
        return view('kogcms.tournament.player.index', [
            'tournamentPlayers' => $tournamentPlayers,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
        ]);
    }

    public function edit($id)
    {
        $tournamentPlayer = TournamentPlayer::find($id);
        $tournament = Tournament::find($tournamentPlayer->tournament_id);
        return view('kogcms.tournament.player.form', [
            'tournamentPlayer' => $tournamentPlayer,
            'route' => ['tournamentPlayer.update', $tournament->id, $tournamentPlayer],
            'method' => 'PATCH',
            'breadcrumb_title' => trans('admin.edit'),
            'tournament' => $tournament,
        ]);
    }

    public function create($tournament_id)
    {
        $tournament = Tournament::find($tournament_id);
        $tournamentPlayer = new TournamentPlayer();
        return view('kogcms.tournament.player.form', [
            'tournamentPlayer' => $tournamentPlayer,
            'route' => ['tournamentPlayer.store', $tournament->id],
            'method' => 'POST',
            'breadcrumb_title' => trans('admin.create'),
            'tournament' => $tournament,
        ]);
    }

    public function update($tournament_id, $tournamentPlayer_id, Request $request)
    {
        $tournamentPlayer = TournamentPlayer::find($tournamentPlayer_id);
        $post = $request->all();
        $post['tournament_id'] = $tournament_id;
        $post['player_id'] = $tournamentPlayer_id;
        $tournamentPlayer->update($post);
        return redirect(route('tournamentPlayer.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function store($tournament_id, Request $request)
    {
        $post = $request->all();
        $tournamentPlayer = new TournamentPlayer();
        $post['tournament_id'] = $tournament_id;
        $post['player_id'] = $request->get('player_id');
        $tournamentPlayer->create($post);
        return redirect(route('tournamentPlayer.index', $tournament_id))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy($id, Request $request)
    {
        try {
            $tournamentPlayer = TournamentPlayer::find($id);
            $tournament_id = $tournamentPlayer->tournament_id;
            $tournamentPlayer->delete();
            return redirect(route('tournamentPlayer.index', $tournament_id))
                ->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('tournamentPlayer.index', $tournament_id))
                ->withMessage($exception->getMessage());
        }
    }
}