@extends('Admin.master')

@section('script')
    <script>
        $(document).ready(function () {
            $('#permission_id').selectpicker();
        })
    </script>
@endsection


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.EDIT_ROLE')}}</h2>
        </div>
        <form class="form-horizontal" action="{{ route('roles.update' , ['id' => $role->id ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">{{__('messages.ROLE_TITLE')}}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('messages.INSERT_ROLE_TITLE')}}" value="{{ $role->name or old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="permission_id" class="control-label">{{__('messages.PERMISSIONS')}}</label>
                    <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                        @foreach(\App\Permission::latest()->get() as $permission)
                            <option value="{{ $permission->id }}" {{ in_array(trim($permission->id) , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }} - {{ $permission->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">{{__('messages.SHORT_DESCRIPTION')}}</label>
                    <textarea rows="5" class="form-control" name="label" id="label" placeholder="{{__('messages.INSERT_DESCRIPTION')}}">{{ $role->label or old('label') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">{{__('messages.SEND')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection