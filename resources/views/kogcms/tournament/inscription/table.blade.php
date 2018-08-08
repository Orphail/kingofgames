<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('inscription.player')</th>
        <th class="text-center">@lang('inscription.total_score')</th>
        <th class="text-center">@lang('inscription.detailed_results')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($inscriptions as $inscription)
        <tr>
            <td>{{ $inscription->nickname }}</td>
            <td class="text-center">{{ $inscription->getTotalScore($tournament->id, $inscription->nickname) }}</td>
            <td class="text-center"><a class="btn btn-sm btn-primary" href="{{ route('inscriptionResult.index', [$tournament->id, $inscription->nickname]) }}">Resultados por juego</a></td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('inscription.edit', [$tournament->id, $inscription->nickname]) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $inscription->nickname }}" href="{{ route('inscription.destroy', [$tournament->id, $inscription->nickname]) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>