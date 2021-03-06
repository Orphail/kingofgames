@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3><a href="{{route('console.index')}}" class="title-text">@lang('console.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('console.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($console, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="row">
                    <div class="offset-4 col-4 offset-4">
                        <div class="form-group">
                            {!! Form::label('name',trans('console.name').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('name',($console->name?$console->name:null), ['class' => 'form-control '.($errors->has('name')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('name')}}</p>
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
    </div>
@endsection