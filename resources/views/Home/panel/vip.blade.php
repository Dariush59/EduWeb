@component('Home.panel.master')

    <div style="margin: 20px;">
        <form action="{{ route('user.panel.vip.payment') }}" method="post">
            {{ csrf_field() }}
            <select name="plan">
                <option value="1"> {{__('messages.VIP_MEMBER_ONE')}}</option>
                <option value="3">{{__('messages.VIP_MEMBER_THREE')}}</option>
                <option value="12">{{__('messages.VIP_MEMBER_TWELVE')}}</option>
            </select>
            <button type="submit">{{__('messages.ADD_CREDIT')}}</button>
        </form>
    </div>

@endcomponent