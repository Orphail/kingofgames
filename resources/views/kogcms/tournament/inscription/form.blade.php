@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3>
                    <a href="{{route('inscription.index', $tournament->id)}}" class="title-text">@lang('inscription.home', ['tournament' => $tournament->name])</a>
                </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('inscription.index', $tournament->id) }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($inscription, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.inscription_creation', ['tournament' => $tournament->name])</span>
                </div>
                <div class="row">
                    <div class="offset-3 col-6 offset-3">
                        <div class="form-group">
                            <label>@lang('inscription.player')</label>
                            <select class="form-control select-player" name="nickname" required>
                                <option value="" disabled selected>Seleccionar o escribir nuevo...</option>
                                @foreach($inscription->getAllUsers() as $player)
                                    @if(!in_array($player, $nicknamesUsed) || $inscription->nickname == $player)
                                        <option value="{{$player}}" {{ $inscription->nickname == $player ? 'selected' : null }} >{{ $player }}</option>
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
            $('.select-player').select2({});
        });
    </script>
@endpush