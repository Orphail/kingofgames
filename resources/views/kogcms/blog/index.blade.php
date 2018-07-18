@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('blog.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('blog.create') }}">@lang('admin.create')</a>
                </div>
                @if($blogs->isEmpty())
                    @include('partials.no-results')
                @else
                    @include('kogcms.blog.table')
                @endif
            </div>
        </div>
    </div>
@stop