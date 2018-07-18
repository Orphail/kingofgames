<div class="row">
	<div class="col-6">
		<span>@lang('admin.results',['total'=>$pages->total(), 'current'=>$pages->count()])</span>
	</div>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th><a href="{{ route('page.index',['sort'=>'id','order'=>($sort=='id' && $desc=="asc"?'desc':'asc')]) }}">ID</a></th>
			<th><a href="{{ route('page.index',['sort'=>'title','order'=>($sort=='title' && $desc=="asc"?'desc':'asc')]) }}">@lang('page.title')</a></th>
			<th><a href="{{ route('page.index',['sort'=>'created_at','order'=>($sort=='created_at' && $desc=="asc"?'desc':'asc')]) }}">@lang('admin.created_at')</a></th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pages as $page)
			<tr>
				<td>{{ $page->id }}</td>
				<td>{{ $page->title }}</td>
				<td>{{ $page->created_at->format('d-m-Y') }}</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							Acciones
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item" href="{{ route('page.edit', $page) }}">@lang('admin.edit')</a></li>
								<li role="separator" class="dropdown-divider"></li>
								<li><a class="dropdown-item delete" data-id="{{ $page->id }}" href="{{ route('page.destroy',$page) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $pages->links() !!}