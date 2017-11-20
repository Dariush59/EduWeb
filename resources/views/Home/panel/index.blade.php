@component('Home.panel.master')

    <ul style="margin: 20px">
        <li>{{__('messages.USER_NAME')}} {{ user()->name }}</li>
        <li>{{__('messages.USER_EMAIL')}} {{ user()->email }}</li>
        @if(user()->isActive())
            <li> {{__('messages.VIP_TIME_REMAIN')}}{{ \Carbon\Carbon::parse(user()->viptime)->diffInDays() }} {{__('messages.DAYS')}}</li>
        @else
            <li>{{__('messages.NOT_VIP_MEMBER')}}</li>
        @endif
    </ul>

@endcomponent