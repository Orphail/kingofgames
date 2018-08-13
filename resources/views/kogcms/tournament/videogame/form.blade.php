@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3>
                    <a href="{{route('kogGame.index', $tournament->id)}}" class="title-text">@lang('kog_game.home', ['tournament' => $tournament->name])</a>
                </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('kogGame.index', $tournament->id) }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($kogGame, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.kog_game_creation', ['tournament' => $tournament->name])</span>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger align-items-center">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="offset-3 col-6 offset-3">
                        <div class="form-group">
                            <label>@lang('kog_game.videogame')</label>
                            <select class="form-control select-videogame" name="videogame" required>
                                <option value="" disabled selected>Selecciona uno...</option>
                                @foreach($kogGame->getAllVideogames($tournament) as $videogame)
                                    @if(!in_array($videogame, $videogamesUsed) || $kogGame->videogame == $videogame)
                                        <option value="{{$videogame}}" {{ $kogGame->videogame == $videogame ? 'selected' : null }} >{{ $videogame }}</option>
                                    @endif
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
            $('.select-videogame').select2({

            });
        });
    </script>
@endpush