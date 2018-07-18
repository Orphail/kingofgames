@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('page.index')}}" class="title-text">@lang('page.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('page.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($page, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                <div class="alert alert-info">
                    <span>@lang('page.description')</span>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::label('slug',trans('page.slug'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('slug',null, ['class' => 'form-control '.($errors->has('slug')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('slug')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title',trans('page.title').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('title',($page->title?$page->title:null), ['class' => 'form-control '.($errors->has('title')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('title')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content',trans('page.content').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::textarea('content',($page->content?$page->content:null), ['class' => 'form-control tiny-mce']) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('content')?'block':'none') }}" >{{ $errors->first('content')}}</p>
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
        $('.tiny-mce').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em'],
                ['link'],
                ['unorderedList', 'orderedList'],
            ],
            svgPath: '/js/trumbowyg/icons.svg',
            removeformatPasted: true,
            lang: 'es'
        });
    </script>
@endpush