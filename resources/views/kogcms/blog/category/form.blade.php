@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('blogCategory.index')}}" class="title-text">@lang('blog_category.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('blogCategory.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($blogCategory, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::label('name',trans('blog_category.name').'*') !!}
                            {!! Form::text('name',($blogCategory->name?$blogCategory->name:null), ['class' => 'form-control '.($errors->has('name')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('name')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                        {!! Form::reset(trans('admin.reset'),['class'=>'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection