@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3>
                    <a href="{{route('tournamentPlayer.index', $tournament->id)}}" class="title-text">@lang('tournament_player.home', ['tournament' => $tournament->name])</a>
                </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('tournamentPlayer.index', $tournament->id) }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($tournamentPlayer, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.tournament_player_creation', ['tournament' => $tournament->name])</span>
                </div>
                <div class="row">
                    <div class="offset-3 col-6 offset-3">
                        <div class="form-group">
                            <label>@lang('tournament_player.player')</label>
                            <select class="form-control select-player" name="player_id" required>
                                <option value="" disabled selected>Selecciona uno...</option>
                                @foreach($tournamentPlayer->getAllUsers() as $id => $player)
                                    <option value="{{$id}}" {{ $tournamentPlayer->player_id == $id ? 'selected' : null }} >{{ $player }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                            {!! Form::reset(trans('admin.reset'),['class'=>'btn btn-danger']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select-player').select2({
            });
        });
    </script>
@endpush