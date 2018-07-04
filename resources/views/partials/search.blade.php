<form class="form-inline pull-right" action="{{ url()->current() }}">
    <div class="form-group pb-3">
        <input type="text" class="form-control form-control-sm" name="filter" value="{{ request('filter') }}"
               placeholder="@lang('admin.search')"/>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
        <a class="btn btn-sm btn-warning" href="{{ url()->current() }}"><i class="fa fa-remove"></i></a>
    </div>
</form>