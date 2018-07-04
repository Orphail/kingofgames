@extends('admin.base')

@section('content')
    <div class="container-fluid mt-3">
        <h3 class="title-text">@lang('user_admin.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.create') }}">@lang('admin.create')</a>
                </div>
                @if($results->count())
                    @include('admin.user.table')
                @else
                    @include('partials.no-results')
                @endif
            </div>
        </div>
    </div>
@stop