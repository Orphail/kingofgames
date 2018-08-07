<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>@lang('tournament.name')</th>
        <th>@lang('tournament.date')</th>
        <th>@lang('tournament.category')</th>
        <th class="text-center">@lang('tournament.players')</th>
        <th class="text-center">@lang('tournament.videogames')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tournaments as $tournament)
        <tr>
            <td>{{ $tournament->id }}</td>
            <td>{{ $tournament->name }}</td>
            <td>{{ $tournament->date }}</td>
            <td>{{ $tournament->getAllCategories()[$tournament->category] }}</td>
            <td class="text-center"><a class="btn btn-sm btn-primary" href="{{ route('inscription.index', $tournament->id) }}">Acceder</a></td>
            <td class="text-center"><a class="btn btn-sm btn-warning" href="{{ route('tournamentGame.index', $tournament->id) }}">Acceder</a></td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('tournament.edit', $tournament) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $tournament->id }}" href="{{ route('tournament.destroy',$tournament) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>