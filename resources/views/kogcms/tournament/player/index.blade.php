@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('tournament_player.home', ['tournament' => $tournament->name])</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('tournamentPlayer.create', $tournament->id) }}">@lang('admin.create')</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('tournament.index') }}">@lang('admin.back')</a>
                </div>
                @if($tournamentPlayers->isEmpty())
                    @include('partials.no-results')
                @else
                    @include('kogcms.tournament.player.table')
                @endif
            </div>
        </div>
    </div>
@stop