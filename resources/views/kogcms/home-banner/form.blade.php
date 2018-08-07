@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('home-banner.index')}}" class="title-text">@lang('home-banner.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('home-banner.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="col-lg-12">
                    <div class="alert alert-danger form-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($HomeBanner, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                <div class="alert alert-info">
                    <span>@lang('admin.home-banner_creation')</span>
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
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::label('title',trans('home-banner.title').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('title',($HomeBanner->title?$HomeBanner->title:null), ['class' => 'form-control '.($errors->has('title')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('title')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link',trans('home-banner.link'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('link',($HomeBanner->link?$HomeBanner->link:null), ['class' => 'form-control']) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('link')?'block':'none') }}">{{ $errors->first('link')}}</p>
                        </div>
                        <div class="form-group">
                            @if($HomeBanner->image)
                                <img src="{{ asset('uploads/'.$HomeBanner->image) }}" class="small-thumbnail">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image',trans('home-banner.image'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::file('image', ['class' => 'form-control '.($errors->has('image')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('image')}}</p>
                        </div>
                        @if ($HomeBanner->image)
                            <div class="form-group">
                                <label>{!! Form::checkbox('delete_image') !!} {{trans('home-banner.delete_image')}}</label>
                            </div>
                        @endif
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