<div class="dropdown pull-right">
    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
        @lang('admin.actions')
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
        <li><a class="dropdown-item"
               href="{{ route(strtolower(class_basename($model)).'.show',[ strtolower(class_basename($model)) => $model]) }}">@lang('admin.show')</a></li>
        <li><a class="dropdown-item"
               href="{{ route(strtolower(class_basename($model)).'.edit',[ strtolower(class_basename($model)) => $model]) }}">@lang('admin.edit')</a></li>
        <li role="separator" class="dropdown-divider"></li>
        <li><a class="delete dropdown-item"
               href="{{ route(strtolower(class_basename($model)).'.destroy',[ strtolower(class_basename($model)) => $model]) }}">@lang('admin.delete')</a>
        </li>
    </ul>
</div>
