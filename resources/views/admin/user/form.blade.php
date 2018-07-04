@extends('admin.base')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('admin.index')}}" class="title-text">@lang('user_admin.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('admin.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p>@lang('admin.required_fields')</p>
                    </div>
                </div>
                {!! Form::model($user, ['route' => $route, 'method'=>$method]) !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('name',trans('user.name').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('name',null, ['class' => 'form-control '.($errors->has('name')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email',trans('user.email').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::email('email',null, ['class' => 'form-control '.($errors->has('email')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('email')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('disabled',trans('user.disabled'), ['class' => 'font-weight-bold']) !!}
                            {!! Form::checkbox('disabled', 1, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password',trans('user.password').'*', ['class' => 'font-weight-bold']) !!}
                            @if($method == "PATCH")
                                &nbsp;<a href="#" id="change_password">@lang('user.change_password')</a>
                            @endif
                            {!! Form::password('password',['class' => 'form-control '.($errors->has('password')?'is-invalid':null),'required'=>true, 'disabled'=>($method=="PATCH")]) !!}
                            <p class="invalid-feedback">{{ $errors->first('password')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation',trans('user.password_confirmation').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::password('password_confirmation',['class' => 'form-control','required'=>true,'disabled'=>($method=="PATCH")]) !!}

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
        @if($method == "PATCH")
            $('#change_password').click(function (e) {
                e.preventDefault();
                $('#password').prop('disabled', false);
                $('#password_confirmation').prop('disabled', false);
            });
        @endif
    </script>
@endpush