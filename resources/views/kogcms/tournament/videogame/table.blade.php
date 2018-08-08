<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('kog_game.videogame')</th>
        <th class="text-center">@lang('kog_game.champion')</th>
        <th class="text-center">@lang('kog_game.results')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($kogGames as $kogGame)
        <tr>
            <td>{{ $kogGame->videogame }}</td>
            <td class="text-center">{!! $kogGame->getChampion($tournament->id, $kogGame->videogame) !!} </td>
            <td class="text-center"><a class="btn btn-sm btn-warning" href="{{ route('kogGameResult.index', [$tournament->id, $kogGame->videogame]) }}">Resultados por participante</a></td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('kogGame.edit', [$tournament->id, $kogGame->videogame]) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $kogGame->videogame }}" href="{{ route('kogGame.destroy', [$tournament->id, $kogGame->videogame]) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>