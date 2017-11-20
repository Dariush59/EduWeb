@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.ROLES')}}</h2>
            <div class="btn-group">
                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-danger">{{__('messages.CREATE_ROLE')}}</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-info">{{__('messages.PERMISSION_SESSION')}}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.ROLE_NAME')}}</th>
                    <th>{{__('messages.DESCRIPTION')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->label }}</td>
                        <td>
                            <form action="{{ route('roles.destroy'  , ['id' => $role->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('roles.edit' , ['id' => $role->id]) }}"  class="btn btn-primary">{{__('messages.EDIT')}}</a>
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
            {!! $roles->render() !!}
        </div>
    </div>
@endsection