@extends('Admin.master')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.EDIT_PERMISSION')}}</h2>
        </div>
        <form class="form-horizontal" action="{{ route('permissions.update' , ['id' => $permission->id ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">{{__('messages.CREATE_PERMISSION')}}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('messages.INSERT_TITLE')}}" value="{{ $permission->name or old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">{{__('messages.SHORT_DESCRIPTION')}}</label>
                    <textarea rows="5" class="form-control" name="label" id="label" placeholder="{{__('messages.INSERT_DESCRIPTION')}}">{{ $permission->label or old('label') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">{{__('messages.EDIT')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection