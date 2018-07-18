@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('blog.index')}}" class="title-text">@lang('blog.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('blog.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($blog, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.blog_creation')</span>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::label('blog_category_id',trans('blog.category')) !!}
                            {!! Form::select('blog_category_id',$blog->allBlogCategories(),null, ['class' => 'form-control '.($errors->has('category')?'is-invalid':null),'required' => false]) !!}
                            <p class="invalid-feedback">{{ $errors->first('category')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link',trans('blog.link')) !!}
                            {!! Form::text('link',null, ['class' => 'form-control '.($errors->has('link')?'is-invalid':null),'required' => false]) !!}
                            <p class="invalid-feedback">{{ $errors->first('link')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('SEO',trans('blog.SEO')) !!}
                            {!! Form::text('SEO',null, ['class' => 'form-control '.($errors->has('SEO')?'is-invalid':null),'required' => false]) !!}
                            <p class="invalid-feedback">{{ $errors->first('SEO')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title',trans('blog.title').'*') !!}
                            {!! Form::text('title',($blog->title?$blog->title:null), ['class' => 'form-control '.($errors->has('question')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('title')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('summary',trans('blog.summary').'*') !!}
                            {!! Form::textarea('summary',($blog->summary?$blog->summary:null), ['class' => 'form-control tiny-mce', 'required' => true]) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('summary')?'block':'none') }}">{{ $errors->first('summary')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description',trans('blog.description').'*') !!}
                            {!! Form::textarea('description',($blog->description?$blog->description:null), ['class' => 'form-control tiny-mce', 'required' => true]) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('description')?'block':'none') }}">{{ $errors->first('description')}}</p>
                        </div>
                        <div class="form-group">
                            @if($blog->image)
                                <img src="{{ asset('uploads/'.$blog->image) }}" class="small-thumbnail">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image',trans('blog.image')) !!}
                            {!! Form::file('image', ['class' => 'form-control '.($errors->has('image')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('image')}}</p>
                        </div>
                        @if ($blog->image)
                            <div class="form-group">
                                <label>{!! Form::checkbox('delete_image') !!} {{trans('blog.delete_image')}}</label>
                            </div>
                        @endif
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