<table class="table table-striped" id="data-table">
    <thead>
    <tr>
        {{--<th>ID</th>--}}
        <th>@lang('videogame.title')</th>
        <th>@lang('videogame.players')</th>
        <th>@lang('videogame.genre')</th>
        {{--<th>@lang('videogame.consoles')</th>--}}
{{--        <th>@lang('videogame.champion')</th>--}}
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    {{--<tbody>--}}
    {{--@foreach($videogames as $videogame)--}}
        {{--<tr>--}}
            {{--<td>{{ $videogame->id }}</td>--}}
            {{--<td>{{ $videogame->title }}</td>--}}
            {{--<td>{{ $videogame->players }}</td>--}}
            {{--<td>{{ $videogame->genre->name }}</td>--}}
            {{--<td>{{ implode(', ', array_column($videogame->consoles->toArray(), 'name')) }}--}}
                {{--@foreach($videogame->consoles as $console)--}}
                {{--{{ $console->name }},--}}
                {{--@endforeach--}}
            {{--</td>--}}
            {{--<td></td>--}}
            {{--<td>--}}
                {{--<div class="dropdown pull-right">--}}
                    {{--<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">--}}
                        {{--@lang('admin.actions')--}}
                        {{--<span class="caret"></span>--}}
                    {{--</button>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a class="dropdown-item"--}}
                               {{--href="{{ route('videogame.edit', $videogame) }}">@lang('admin.edit')</a></li>--}}
                        {{--<li role="separator" class="dropdown-divider"></li>--}}
                        {{--<li><a class="delete dropdown-item"--}}
                               {{--data-id="{{ $videogame->id }}" href="{{ route('videogame.destroy',$videogame) }}">@lang('admin.delete')</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
</table>
@push('scripts')
    <script type="text/javascript">
        var routeAjax = '{!! route('videogame.index') !!}';
        var columns = [
            // {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'players', name: 'players'},
            {data: 'genre_name', name: 'genre_name'},
            // {data: 'console_name', name: 'console_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ];
    </script>
    @include('common.data-tables')
@endpush