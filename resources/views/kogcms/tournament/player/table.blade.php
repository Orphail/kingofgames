<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('tournament_player.player')</th>
        <th>@lang('tournament_player.results')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tournamentPlayers as $tournamentPlayer)
        <tr>
            <td>{{ $tournamentPlayer->getAllUsers()[$tournamentPlayer->player_id] }}</td>
            <td></td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('tournamentPlayer.edit', $tournamentPlayer->id) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $tournamentPlayer->id }}" href="{{ route('tournamentPlayer.destroy', $tournamentPlayer->id) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>