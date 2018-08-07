@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3><a href="{{route('videogame.index')}}" class="title-text">@lang('videogame.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('videogame.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($videogame, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.videogame_creation')</span>
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
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('title',trans('videogame.title').'*', ['class' => 'font-weight-bold']) !!}
                                    {!! Form::text('title',($videogame->title?$videogame->title:null), ['class' => 'form-control '.($errors->has('title')?'is-invalid':null),'required' => true]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('title')}}</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('players',trans('videogame.players').'*', ['class' => 'font-weight-bold']) !!}
                                    {!! Form::text('players',($videogame->players?$videogame->players:null), ['class' => 'form-control '.($errors->has('players')?'is-invalid':null),'required' => true]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('players')}}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('genre_id',trans('videogame.genre').'*', ['class' => 'font-weight-bold']) !!}
                                    {!! Form::select('genre_id', $videogame->getAllGenres(), null, ['class' => 'form-control '.($errors->has('genre_id')?'is-invalid':null),'required' => true]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('genre_id')}}</p>
                                </div>
                                <div class="form-group">
                                    <label>@lang('videogame.consoles')</label>
                                    <select class="form-control select-consoles" multiple="multiple" name="consoles[]">
                                        @foreach($videogame->getAllConsoles() as $id => $console)
                                            <option value="{{$id}}">{{ $console }}</option>
                                        @endforeach
                                        @if(!empty($consoles))
                                            @foreach($consoles as $id => $console)
                                                <option value="{{ $id }}" selected> {{ $console }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
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
            $('.select-consoles').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
@endpush