@component('mail::message')
{{__('messages.EMAIL_ACTIVATION')}}

@component('mail::button' , ['url' => route('activation.account' , $code)])
{{__('messages.ACCOUNT_ACTIVATION')}}
@endcomponent

@endcomponent


