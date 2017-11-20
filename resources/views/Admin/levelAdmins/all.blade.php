@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.SITE_MANAGEMENT')}}</h2>
            <div class="btn-group">
                <a href="{{ route('level.create') }}" class="btn btn-sm btn-info">{{__('messages.REGISTER_ROLE_TO_USER')}}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.NAME_OF_USER')}}</th>
                    <th>{{__('messages.EMAIL')}}</th>
                    <th>{{__('messages.ROLE')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @if(count($role->users))
                        @foreach($role->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $role->name }} - {{ $role->label }}</td>
                                <td>
                                    <form action="{{ route('level.destroy'  , ['id' => $user->id]) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('level.edit' , ['id' => $user->id]) }}"  class="btn btn-primary">{{__('messages.EDIT')}}</a>
                                            <button type="submit" class="btn btn-danger">{{__('messages.DELETE')}}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $roles->render() !!}
        </div>
    </div>
@endsection