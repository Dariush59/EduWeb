@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.CREATE_COURSE')}}</h2>
        </div>
        <form class="form-horizontal" action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">{{__('messages.COURSE_TITLE')}}</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('messages.INSERT_TITLE')}}" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">{{__('messages.COURSE_TYPE')}}</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vip">{{__('messages.VIP')}}</option>
                        <option value="cash">{{__('messages.CASH')}}</option>
                        <option value="free" selected>{{__('messages.FREE')}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">{{__('messages.TEXT')}}</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="{{__('messages.INSERT_ARTICLE_TEXT')}}">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">{{__('messages.COURSE_IMAGE')}}</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="{{__('messages.INSERT_IMAGE')}}" value="{{ old('imageUrl') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="price" class="control-label">{{__('messages.PRICE')}}</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="{{__('messages.INSERT_PRICE')}}" value="{{ old('price') }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">{{__('messages.TAG')}}</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="{{__('messages.INSERT_TAG')}}" value="{{ old('tags') }}">
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