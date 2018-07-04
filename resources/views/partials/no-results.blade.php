@if(request('filter'))
    <div class="text-center">
        <h3 class="text-center">@lang('admin.no_results')</h3>
        <a class="btn btn-primary" href="{{ url()->current() }}">@lang('admin.restart_filter')</a>
    </div>
@else
    <h3 class="text-center">@lang('admin.empty_table')</h3>
@endif