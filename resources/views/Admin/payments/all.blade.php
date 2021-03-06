@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.ALL_COMMENTS')}}</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.NAME_OF_USER')}}</th>
                    <th>{{__('messages.PAYMENT')}}</th>
                    <th>{{__('messages.PAYMENT_TYPE')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->price }}</td>
                        @if($payment->course_id == 'vip')
                            <td>{{__('messages.VIP_MEMBER_FOR')}}</td>
                        @else
                            <td>{{ $payment->course->title }}</td>
                        @endif
                        <td>
                            <form action="{{ route('payments.destroy'  , ['id' => $payment->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <button type="submit" class="btn btn-danger">{{__('messages.DELETE')}}</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $payments->render() !!}
        </div>
    </div>
@endsection