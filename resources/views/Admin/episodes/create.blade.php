@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $('#course_id').selectpicker();
        })
    </script>
    <script>
        CKEDITOR.replace('description' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.CREATE_VIDEO')}}</h2>
        </div>
        <form class="form-horizontal" action="{{ route('episodes.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">{{__('messages.VIDEO_TITLE')}}</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('messages.INSERT_TITLE')}}" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="course_id" class="control-label">{{__('messages.RELATED_COURSE')}}</label>
                    <select class="form-control" name="course_id" id="course_id">
                        @foreach(\App\Course::latest()->get() as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">{{__('messages.VIDEO_TYPE')}}</label>
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
                <div class="col-sm-6">
                    <label for="time" class="control-label">{{__('messages.VIDEO_TIME')}}</label>
                    <input type="text" class="form-control" name="time" id="time" placeholder="{{__('messages.INSERT_TIME')}}" value="{{ old('time') }}">
                </div>
                <div class="col-sm-6">
                    <label for="number" class="control-label">{{__('messages.EPISODE_NO')}}</label>
                    <input type="text" class="form-control" name="number" id="number" placeholder="{{__('messages.INSERT_EPISODE_NO')}}" value="{{ old('number') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="videoUrl" class="control-label">{{__('messages.LINK')}}</label>
                    <input type="text" class="form-control" name="videoUrl" id="videoUrl" placeholder="{{__('messages.INSERT_LINK')}}" value="{{ old('videoUrl') }}">
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