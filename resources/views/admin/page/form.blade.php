@extends('admin.base')

@section('content')
    <div class="container-fluid mt-3">
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
                            <nav class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                @foreach (config('translatable.locales') as $key => $locale)
                                    <a class="nav-item nav-link {{ $key == $locale ? 'active':null }}"
                                       id="nav-tab-{{$locale}}" data-toggle="tab" role="tab" href="#tab-{{$locale}}"
                                       aria-controls="tab-{{$locale}}"
                                       aria-selected="{{ $key == $locale ? 'true':'false' }}">{{ trans('admin.'.$locale) }}</a>
                                @endforeach
                            </nav>
                            <div class="tab-content" id="myTabContent">
                                @foreach (config('translatable.locales')  as $key => $locale)
                                    <div class="tab-pane fade {{ $key == 0 ? 'show active':null }}"
                                         id="tab-{{ $locale }}" role="tabpanel" aria-labelledby="nav-tab-{{$locale}}">
                                        <div class="form-group">
                                            {!! Form::label($locale.'[title]',trans('page.title').' '.$locale.'*', ['class' => 'font-weight-bold']) !!}
                                            {!! Form::text($locale.'[title]',($page->hasTranslation($locale)?$page->translate($locale)->title:null), ['class' => 'form-control '.($errors->has($locale.'.title')?'is-invalid':null)]) !!}
                                            <p class="invalid-feedback">{{ $errors->first($locale.'.title')}}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label($locale.'[content]',trans('page.content').' '.$locale.'*', ['class' => 'font-weight-bold']) !!}
                                            {!! Form::textarea($locale.'[content]',($page->hasTranslation($locale)?$page->translate($locale)->content:null), ['class' => 'form-control tiny-mce']) !!}
                                            <p class="invalid-feedback" style="display: {{ ($errors->has($locale.'.content')?'block':'none') }}" >{{ $errors->first($locale.'.content')}}</p>
                                        </div>
                                    </div>
                                @endforeach
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