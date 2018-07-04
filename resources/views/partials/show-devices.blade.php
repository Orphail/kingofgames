{!! Form::label('devices',trans('customer.available_devices')) !!}

@php ($deviceCount = 0)
<table class="table table-striped">
    <thead>
    <tr>
        <th>@lang('device.reference')</th>
        <th>@lang('device.name')</th>
        <th>@lang('device.commerce_zone')</th>
        <th>@lang('device.commerce_name')</th>
        <th>@lang('device.status_name')</th>
        <th>@lang('device.campaign_name')</th>
        <th>@lang('device.select')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($customer->devices as $device)
        {{--        @if(!$device->campaign_id || $device->campaign_id == $campaign->id)--}}
        @php ($deviceCount++)
        <tr class="clickable" data-row="{{ $device->id }}">
            <td>
                {{ $device->reference }}
            </td>
            <td>
                {{ $device->name }}
            </td>
            <td>
                {{ $device->commerce_zone }}
            </td>
            <td>
                {{ $device->commerce_name }}
            </td>
            <td>
                {{ $device->status->name }}
            </td>
            <td class="{{$device->campaigns->count()?"text-danger":"text-success"}}">
                @if($device->campaigns->count())
                    @foreach($device->campaigns as $campaign)
                        @if($loop->last)
                            {{ $campaign->name }}
                        @else
                            {{ $campaign->name }},
                        @endif
                    @endforeach
                @else
                    @lang('admin.none')
                @endif
            </td>
            <td class="text-center">
                {{ Form::checkbox('devices[]', $device->id, session()->get('campaign.devices'), []) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if(!$customer->devices->first())
    <div class="alert alert-info form-group text-center">
        <span>@lang('campaign.no_devices_customer')</span>
        <br>
        <br>
        <div>
            <a href="mailto:dani@itemvirtual.com?subject=@lang('device.request_subject')">@lang('campaign.acquire_devices')</a>
        </div>
    </div>
@elseif($deviceCount == 0)
    <div class="alert alert-danger form-group">
        <span>@lang('campaign.no_available_devices')</span>
        <div>
            <a href="mailto:dani@itemvirtual.com?subject=@lang('device.request_subject')">@lang('campaign.acquire_devices')</a>
        </div>
    </div>
@endif