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
            <h2>{{__('messages.CREATE_PERMISSION')}}</h2>
        </div>
        <form class="form-horizontal" action="{{ route('permissions.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">{{__('messages.PERMISSION_TITLE')}}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('messages.INSERT_TITLE')}}" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">{{__('messages.SHORT_DESCRIPTION')}}ه</label>
                    <textarea rows="5" class="form-control" name="label" id="label" placeholder="{{__('messages.INSERT_DESCRIPTION')}}">{{ old('label') }}</textarea>
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