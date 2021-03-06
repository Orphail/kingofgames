@extends('kogcms.base')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="title-text">@lang('page.home')</h3>
        <div class="card border-0">
            <div class="card-body">
                <div class="text-right mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('page.create') }}">@lang('admin.create')</a>
                </div>
            @if($pages->isEmpty())
                    <div class="text-center">
                        <h2>No existen páginas</h2>
                    </div>
                @else
                    @include('kogcms.page.table')
                @endif
            </div>
        </div>
    </div>
@stop