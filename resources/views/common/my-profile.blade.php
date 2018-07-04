@extends($baseTheme)

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <a class="breadcrumb-item" href="{{ route('my-profile') }}">@lang('user_admin.home')</a>
                <span class="breadcrumb-item active">@lang('admin.my_profile')</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p>@lang('admin.required_fields')</p>
                    </div>
                </div>
                {!! Form::model($user, ['route' => ['my-profile.update',$user], 'method'=>'PATCH']) !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('name',trans('user.name').'*') !!}
                            {!! Form::text('name',null, ['class' => 'form-control '.($errors->has('name')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email',trans('user.email').'*') !!}
                            {!! Form::email('email',null, ['class' => 'form-control '.($errors->has('email')?'is-invalid':null),'required'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('email')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password',trans('user.password').'*') !!}
                            &nbsp;<a href="#" id="change_password">@lang('user.change_password')</a>
                            {!! Form::password('password',['class' => 'form-control '.($errors->has('password')?'is-invalid':null),'required'=>true, 'disabled'=>true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('password')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation',trans('user.password_confirmation').'*') !!}
                            {!! Form::password('password_confirmation',['class' => 'form-control','required'=>true,'disabled'=>true]) !!}

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
        $('#change_password').click(function (e) {
            e.preventDefault();
            $('#password').prop('disabled', false);
            $('#password_confirmation').prop('disabled', false);
        });
    </script>
@endpush