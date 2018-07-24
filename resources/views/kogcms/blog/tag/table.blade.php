<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>@lang('tag.name')</th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('admin.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item"
								   href="{{ route('tag.edit', $tag) }}">@lang('admin.edit')</a></li>
							<li role="separator" class="dropdown-divider"></li>
							<li><a class="delete dropdown-item"
								   data-id="{{ $tag->id }}" href="{{ route('tag.destroy',$tag) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>