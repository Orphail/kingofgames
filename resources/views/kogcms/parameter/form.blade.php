@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('parameter.index')}}" class="title-text">@lang('parameter.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('parameter.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($parameter, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.parameter_creation')</span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::label('key',trans('parameter.key').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('key',null, ['class' => 'form-control '.($errors->has('key')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('key')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('type',trans('parameter.type').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::select('type',['text'=>trans('parameter.text'),'file'=>trans('parameter.file')],null, ['class' => 'form-control '.($errors->has('type')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('type')}}</p>
                        </div>
                        <div class="form-group" id="text" style="display: {{ $method == "POST" || $parameter->type == "text"?"":"none" }}">
                            {!! Form::label('value_text',trans('parameter.value_text').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('value_text',old('value_text',$parameter->value),['class' => 'form-control '.($errors->has('value_text')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('value_text')}}</p>
                        </div>
                        <div class="form-group" id="file" style="display: {{ $parameter->type == "file"?"":"none" }}">
                            {!! Form::label('value_file',trans('parameter.value_file').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::file('value_file',['class' => 'form-control '.($errors->has('value_file')?'is-invalid':null)]) !!}
                            <p class="invalid-feedback">{{ $errors->first('value_file')}}</p>
                            @if($parameter->value)
                                <a target="_blank" href="{{ url('uploads/'.$parameter->value) }}">@lang('admin.link')</a>
                            @endif
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
        $('#type').change(function (e) {
            $('#file').hide();
            $('#text').hide();
            $('#' + $(this).val()).show();
        })
    </script>
@endpush