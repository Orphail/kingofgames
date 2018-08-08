@inject('CommonController','App\Http\Controllers\Kogcms\CommonController')
@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('inscription_result.home', ['tournament' => $tournament->name, 'nickname' => $nickname])</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('inscription.create', $tournament->id) }}">@lang('admin.create')</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('inscription.index', $tournament->id) }}">@lang('admin.back')</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('inscription_result.player')</th>
                        <th class="text-center">@lang('inscription_result.score')</th>
                        <th class="text-center">@lang('inscription_result.evaluation')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videogames as $videogame)
                        <tr>
                            <td>{{ $videogame->id }}</td>
                            <td>{{ $videogame->videogame }}</td>
                            <td class="text-center">{!! $CommonController->getScoreInput($videogame) !!} </td>
                            <td class="text-center">{!! $CommonController->getEvaluationInput($videogame) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop