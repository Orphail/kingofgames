<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('tournament_game.videogame')</th>
        <th>@lang('tournament_game.champion')</th>
        <th>@lang('tournament_game.results')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tournamentGames as $tournamentGame)
        <tr>
            <td>{{ $tournamentGame->videogame }}</td>
            <td></td>
            <td></td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('tournamentGame.edit', [$tournament->id, $tournamentGame->videogame]) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $tournamentGame->videogame }}" href="{{ route('tournamentGame.destroy', [$tournament->id, $tournamentGame->videogame]) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>