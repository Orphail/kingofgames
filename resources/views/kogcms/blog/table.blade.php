<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>@lang('blog.category')</th>
			<th>@lang('blog.title')</th>
			<th>@lang('blog.image')</th>
			<th>@lang('blog.link')</th>
			<th>@lang('admin.created_at')</th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($blogs as $blog)
			<tr>
				<td>{{ $blog->id }}</td>
				<td>{{ $blog->categoryName($blog->blog_category_id) }}</td>
				<td>{{ $blog->title }}</td>
				<td>
					@if($blog->image)
						<img class="small-thumbnail" src="{{asset('uploads/'.$blog->image)}}"/>
					@endif
				</td>
				<td><a href="{{ $blog->link }}">{{ $blog->link }}</a></td>
				<td>{{ $blog->created_at->format('d-m-Y') }}</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('blog.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item"
								   href="{{ route('blog.edit', $blog) }}">@lang('admin.edit')</a></li>
							<li role="separator" class="dropdown-divider"></li>
							<li><a class="delete dropdown-item"
								   data-id="{{ $blog->id }}" href="{{ route('blog.destroy',$blog) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>