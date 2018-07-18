@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('parameter.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('parameter.create') }}">@lang('admin.create')</a>
                </div>
            @if($results->count())
                    @include('kogcms.parameter.table')
                @else
                    @include('partials.no-results')
                @endif
            </div>
        </div>
    </div>
@stop