@component('Home.panel.master')

    <div style="margin: 20px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{__('messages.PRICE_TO_PAY')}}</th>
                    <th>{{__('messages.PAYMENT_STATUS')}}</th>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->price }} {{__('messages.CURRENCY_SYMBOL')}} </td>
                        <td>{{ $payment->payment == 1 ? __('messages.SUCCESSFUL') : __('messages.UNSUCCESSFUL') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endcomponent