<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>@lang('blog_category.name')</th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($blogCategories as $blogCategory)
			<tr>
				<td>{{ $blogCategory->id }}</td>
				<td>{{ $blogCategory->name }}</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('admin.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item"
								   href="{{ route('blogCategory.edit', $blogCategory) }}">@lang('admin.edit')</a></li>
							<li role="separator" class="dropdown-divider"></li>
							<li><a class="delete dropdown-item"
								   data-id="{{ $blogCategory->id }}" href="{{ route('blogCategory.destroy',$blogCategory) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>