@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('rank.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('rank.create') }}">@lang('admin.create')</a>
                </div>
                @if($ranks->isEmpty())
                    @include('partials.no-results')
                @else
                    @include('kogcms.rank.table')
                @endif
            </div>
        </div>
    </div>
@stop