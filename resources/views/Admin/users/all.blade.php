@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.USERS')}}</h2>
            <div class="btn-group">
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-info">{{__('messages.ACCESS_LEVEL')}}</a>
                <a href="{{ route('level.index') }}" class="btn btn-sm btn-success">{{__('messages.USERS_MANAGEMENT')}}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.USER_NAME')}}</th>
                    <th>{{__('messages.EMAIL')}}</th>
                    <th>{{__('messages.EMAIL_STATUS')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>0</td>
                        <td>
                            <form action="{{ route('users.destroy'  , ['id' => $user->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $users->render() !!}
        </div>
    </div>
@endsection