@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('genre.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('genre.create') }}">@lang('admin.create')</a>
                </div>
                @if($genres->isEmpty())
                    @include('partials.no-results')
                @else
                    @include('kogcms.genre.table')
                @endif
            </div>
        </div>
    </div>
@stop