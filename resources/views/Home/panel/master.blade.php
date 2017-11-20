@extends('Home.master')

@section('content')

    <div class="jumbotron">
        <h1>{{__('messages.USER_PANEL.TITLE')}}</h1>
        <p>{{__('messages.EDIT_INFO')}}</p>
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="{{ Route::currentRouteName() == 'user.panel' ? 'active' : '' }}"><a href="{{ route('user.panel')  }}">{{__('messages.USER_INFO')}}</a></li>
        <li role="presentation" class="{{ Route::currentRouteName() == 'user.panel.history' ? 'active' : '' }}"><a href="{{ route('user.panel.history')  }}">{{__('messages.PAYMENT_SUCCESSFUL')}}</a></li>
        <li role="presentation" class="{{ Route::currentRouteName() == 'user.panel.vip' ? 'active' : '' }}"><a href="{{ route('user.panel.vip')  }}">{{__('messages.VIP_CHARGE')}}</a></li>
    </ul>

    {{ $slot }}
@endsection