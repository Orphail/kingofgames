@inject('CommonController','App\Http\Controllers\Kogcms\CommonController')
@include('partials.form-totals')

<table class="table table-striped">
    <thead>
    <tr>
        <th>
            <a href="{{ route('user.index',['filter'=> request('filter'), 'sort'=>'name','order'=>(request('sort')=='name' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.name')</a>
        </th>
        <th>
            <a href="{{ route('user.index',['filter'=> request('filter'), 'sort'=>'email','order'=>(request('sort') && request('order')=="asc"?'desc':'asc')]) }}">Email</a>
        </th>
        <th>@lang('user.rank')</th>
        <th>@lang('user.image')</th>
        <th>
            <a href="{{ route('user.index',['filter'=> request('filter'), 'sort'=>'created_at','order'=>(request('sort')=='created_at' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.created_at')</a>
        </th>
        <th>
            <a href="{{ route('user.index',['filter'=> request('filter'), 'sort'=>'disabled','order'=>(request('sort')=='disabled' && request('order')=="asc"?'desc':'asc')]) }}">@lang('user.enabled')</a>
        </th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $user)
        <tr>
            <td>
                <a href="{{ route('member.login-as-member',$user->id) }}"><b>{{ $user->nickname }}</b></a>
            </td>
            <td>
                <a href="mailto:{{ $user->email  }}">{{ $user->email }}</a>
            </td>
            <td>
                {{ $user->rank->name }}
            </td>
            <td>
                @if($user->image)
                    <img class="small-thumbnail" src="{{asset('uploads/'.$user->image)}}"/>
                @endif
            </td>
            <td>
                {{ $user->created_at ? $user->created_at->format('d-m-Y') : '' }}
            </td>
            <td>{!! $CommonController->getBooleanInput($user) !!}</td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="{{ route('user.edit', $user) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item delete" href="{{ route('user.destroy',$user) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>