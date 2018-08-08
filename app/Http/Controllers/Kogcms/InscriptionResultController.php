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

class InscriptionResultController extends Controller
{

    public function index($tournament_id, $nickname, Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $tournament = Tournament::find($tournament_id);
        $videogames = Result::where('tournament_id', $tournament_id)
            ->where('nickname', $nickname)
            ->get();
        return view('kogcms.tournament.inscription.result', [
            'videogames' => $videogames,
            'sort' => $field,
            'desc' => $desc,
            'tournament' => $tournament,
            'nickname' => $nickname,
        ]);
    }

}