@inject('CommonController','App\Http\Controllers\Kogcms\CommonController')
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>@lang('home-banner.title')</th>
        <th>@lang('home-banner.link')</th>
        <th>@lang('home-banner.image')</th>
        <th>@lang('home-banner.active')</th>
        <th>@lang('home-banner.order')</th>
        <th>@lang('admin.created_at')</th>
        <th class="text-right">@lang('admin.options')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($HomeBanners as $HomeBanner)
        <tr>
            <td>{{ $HomeBanner->id }}</td>
            <td>{{ $HomeBanner->title }}</td>
            <td>
                <a href="{{$HomeBanner->link}}" target="_blank">
                    {{ $HomeBanner->link ? trans('admin.website'):null}}
                </a>
            </td>
            <td>
                @if($HomeBanner->image)
                    <img class="small-thumbnail" src="{{asset('uploads/'.$HomeBanner->image)}}"/>
                @endif
            </td>
            <td>{!! $CommonController->getBooleanInput($HomeBanner) !!}</td>
            <td>{!! $CommonController->getOrderInput($HomeBanner) !!}</td>
            <td>{{ $HomeBanner->created_at->format('d-m-Y') }}</td>
            <td>
                <div class="dropdown pull-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        @lang('admin.actions')
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="{{ route('home-banner.edit', $HomeBanner) }}">@lang('admin.edit')</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="delete dropdown-item"
                               data-id="{{ $HomeBanner->id }}" href="{{ route('home-banner.destroy',$HomeBanner) }}">@lang('admin.delete')</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>