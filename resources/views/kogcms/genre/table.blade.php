<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>@lang('genre.name')</th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($genres as $genre)
			<tr>
				<td>{{ $genre->id }}</td>
				<td>{{ $genre->name }}</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('admin.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item"
								   href="{{ route('genre.edit', $genre) }}">@lang('admin.edit')</a></li>
							<li role="separator" class="dropdown-divider"></li>
							<li><a class="delete dropdown-item"
								   data-id="{{ $genre->id }}" href="{{ route('genre.destroy',$genre) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>