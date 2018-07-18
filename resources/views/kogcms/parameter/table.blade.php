@include('partials.form-totals')


<table class="table table-striped">
	<thead>
		<tr>
			<th><a href="{{ route('parameter.index',['filter'=> request('filter'), 'sort'=>'key','order'=>(request('sort')=="key" && request('order')=="asc"?"desc":"asc")]) }}"> @lang('parameter.key')</a></th>
			<th><a href="{{ route('parameter.index',['filter'=> request('filter'), 'sort'=>'value','order'=>(request('sort')=="value" && request('order')=="asc"?"desc":"asc")]) }}">@lang('parameter.value')</a></th>
			<th><a href="{{ route('parameter.index') }}">@lang('admin.created_at')</a></th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($results as $parameter)
			<tr class="clickable" data-row="{{ $parameter->id }}">
				<td>
					{{ $parameter->key }}
				</td>
				<td>
					{{ $parameter->value }}
				</td>
				<td>
					{{ $parameter->created_at->format('d-m-Y') }}
				</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('admin.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item" href="{{ route('parameter.edit', $parameter->id) }}">@lang('admin.edit')</a></li>
								<li role="separator" class="dropdown-divider"></li>
								<li><a class="dropdown-item delete" href="{{ route('parameter.destroy',$parameter) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>