@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6 pl-4">
                <h3><a href="{{route('user.index')}}" class="title-text">@lang('user.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('user.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-12">
                        <p>@lang('admin.required_fields')</p>
                    </div>
                </div>
                {!! Form::model($user, ['route' => $route, 'method'=>$method, 'files' => true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.user_creation')</span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('nickname',trans('user.nickname').'*', ['class' => 'font-weight-bold']) !!}
                                    {!! Form::text('nickname',null, ['class' => 'form-control '.($errors->has('nickname')?'is-invalid':null),'required'=>true]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('nickname')}}</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email',trans('user.email').'*', ['class' => 'font-weight-bold']) !!}
                                    {!! Form::email('email',null, ['class' => 'form-control '.($errors->has('email')?'is-invalid':null),'required'=>true]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('email')}}</p>
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
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('rank_id',trans('user.rank'), ['class' => 'font-weight-bold']) !!}
                                    {!! Form::select('rank_id', $user->getAllRanks(), null, ['class' => 'form-control '.($errors->has('rank_id')?'is-invalid':null), 'placeholder' => 'Selecciona uno...']) !!}
                                    <p class="invalid-feedback">{{ $errors->first('rank_id')}}</p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('disabled',trans('user.disabled'), ['class' => 'font-weight-bold']) !!}
                                    {!! Form::checkbox('disabled', 1, null, ['class' => 'form-control disabled']) !!}
                                </div>
                                <div class="form-group">
                                    @if($user->image)
                                        <img src="{{ asset('uploads/'.$user->image) }}" class="medium-thumbnail">
                                    @endif
                                </div>
                                <div class="form-group">
                                    {!! Form::label('image',trans('user.image'), ['class' => 'font-weight-bold']) !!}
                                    {!! Form::file('image', ['class' => 'form-control '.($errors->has('image')?'is-invalid':null)]) !!}
                                    <p class="invalid-feedback">{{ $errors->first('image')}}</p>
                                </div>
                                @if ($user->image)
                                    <div class="form-group">
                                        <label>{!! Form::checkbox('delete_image') !!} {{trans('blog.delete_image')}}</label>
                                    </div>
                                @endif
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