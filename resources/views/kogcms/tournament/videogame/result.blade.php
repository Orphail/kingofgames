@inject('CommonController','App\Http\Controllers\Kogcms\CommonController')
@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('kog_game_result.home', ['tournament' => $tournament->name, 'videogame' => $videogame])</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('kogGame.create', $tournament->id) }}">@lang('admin.create')</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('kogGame.index', $tournament->id) }}">@lang('admin.back')</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('kog_game_result.player')</th>
                        <th class="text-center">@lang('kog_game_result.score')</th>
                        <th class="text-center">@lang('kog_game_result.evaluation')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->id }}</td>
                            <td>{{ $inscription->nickname }}</td>
                            <td class="text-center">{!! $CommonController->getScoreInput($inscription) !!} </td>
                            <td class="text-center">{!! $CommonController->getEvaluationInput($inscription) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop