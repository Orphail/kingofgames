@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mb-3">
            <div class="col-6 pl-4">
                <h3><a href="{{route('tournament.index')}}" class="name-text">@lang('tournament.home')</a></h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('tournament.index') }}">@lang('admin.back')</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body bg-light">
                {!! Form::model($tournament, ['route' => $route, 'method'=>$method, 'files'=>true]) !!}
                @csrf
                <div class="alert alert-info">
                    <span>@lang('admin.tournament_creation')</span>
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
                    <div class="offset-3 col-6 offset-3">
                        <div class="form-group">
                            {!! Form::label('name',trans('tournament.name').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('name',($tournament->name?$tournament->name:null), ['class' => 'form-control '.($errors->has('name')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('date',trans('tournament.date').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::text('date', (($tournament->date)?date('d/m/Y', strtotime($tournament->date)):null), ['class' => 'form-control date-picker '.($errors->has('date')?'is-invalid':null), 'required' => true]) !!}
                            <p class="invalid-feedback" style="display: {{ ($errors->has('date')?'block':'none') }}">{{ $errors->first('date')}}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('category',trans('tournament.category').'*', ['class' => 'font-weight-bold']) !!}
                            {!! Form::select('category', $tournament->getAllCategories(), null, ['class' => 'form-control '.($errors->has('category')?'is-invalid':null),'required' => true]) !!}
                            <p class="invalid-feedback">{{ $errors->first('category')}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-center form-group">
                    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                    {!! Form::reset(trans('admin.reset'),['class'=>'btn btn-danger']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('.date-picker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: "fa fa-arrow-left",
                next: "fa fa-arrow-right"
            },
            locale: 'es',
            format: 'DD/MM/YYYY',
        });
    </script>
@endpush