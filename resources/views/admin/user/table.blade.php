@include('partials.form-totals')

<table class="table table-comercios table-striped">
	<thead>
		<tr>
			<th><a href="{{ route('admin.index',['filter'=> request('filter'), 'sort'=>'name','order'=>(request('sort')=='name' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.name')</a></th>
			<th><a href="{{ route('admin.index',['filter'=> request('filter'), 'sort'=>'email','order'=>(request('sort') && request('order')=="asc"?'desc':'asc')]) }}">Email</a></th>
			<th><a href="{{ route('admin.index',['filter'=> request('filter'), 'sort'=>'created_at','order'=>(request('sort')=='created_at' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.created_at')</a></th>
			<th><a href="{{ route('admin.index',['filter'=> request('filter'), 'sort'=>'disabled','order'=>(request('sort')=='disabled' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.disabled')</a></th>
			<th class="text-right">@lang('admin.options')</th>
		</tr>
	</thead>
	<tbody>
		@foreach($results as $user)
			<tr>
				<td>
					<b>{{ $user->name }}</b>
				</td>
				<td>
					<a href="mailto:{{ $user->email  }}">{{ $user->email }}</a>
				</td>
				<td>
					{{ $user->created_at->format('d-m-Y') }}
				</td>
				<td>
					@if ($user->disabled)
						<span class="label label-round label-danger">
							@lang('admin.disabled')
						</span>
					@else
						<span class="label label-round label-success">
							@lang('admin.enabled')
						</span>
					@endif
				</td>
				<td>
					<div class="dropdown pull-right">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
							@lang('admin.actions')
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item" href="{{ route('admin.edit', $user) }}">@lang('admin.edit')</a></li>
								<li role="separator" class="dropdown-divider"></li>
								<li><a class="dropdown-item delete" href="{{ route('admin.destroy',$user) }}">@lang('admin.delete')</a></li>
						</ul>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>