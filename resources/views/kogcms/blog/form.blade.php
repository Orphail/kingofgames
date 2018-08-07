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
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('title',trans('blog.title').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('title',($blog->title?$blog->title:null), ['class' => 'form-control '.($errors->has('question')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('title')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('summary',trans('blog.summary').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::textarea('summary',($blog->summary?$blog->summary:null), ['class' => 'form-control', 'required' => true, 'rows' => 6]) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('summary')?'block':'none') }}">{{ $errors->first('summary')}}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('blog_category_id',trans('blog.category'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::select('blog_category_id',$blog->allBlogCategories(),null, ['class' => 'form-control '.($errors->has('category')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('category')}}</p>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('post_date',trans('blog.post_date')) !!}--}}
                        {{--{!! Form::date('post_date',null, ['class' => 'form-control '.($errors->has('post_date')?'is-invalid':null),'required' => true]) !!}--}}
                        {{--<p class="invalid-feedback">{{ $errors->first('post_date')}}</p>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            {!! Form::label('status',trans('blog.status'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::select('status',$blog->getAllStatus(),null, ['class' => 'form-control '.($errors->has('status')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('status')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('author_id',trans('blog.author'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::select('author_id',$blog->getAllAuthors(),null, ['class' => 'form-control '.($errors->has('author_id')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('author_id')}}</p>
                        </div>
                        <div class="form-group">
                            @if($blog->image)
                                <img src="{{ asset('uploads/'.$blog->image) }}" class="small-thumbnail">
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image',trans('blog.image'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::file('image', ['class' => 'form-control '.($errors->has('image')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('image')}}</p>
                        </div>
                        @if ($blog->image)
                            <div class="form-group">
                                <label>{!! Form::checkbox('delete_image') !!} {{trans('blog.delete_image')}}</label>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('blog.tags')</label>
                            <select class="form-control select-tags" multiple="multiple" name="tags[]">
                                @foreach($tags as $tag)
                                    <option value="{{$tag}}">{{ $tag }}</option>
                                @endforeach
                                @if($blog->tags)
                                    @foreach(json_decode($blog->tags) as $tag)
                                        <option value="{{ $tag }}" selected> {{ $tag }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description',trans('blog.description').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::textarea('description',($blog->description?$blog->description:null), ['class' => 'form-control tiny-mce', 'required' => true]) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('description')?'block':'none') }}">{{ $errors->first('description')}}</p>
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
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select-tags').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
@endpush