@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.COURSES')}}</h2>
           <div class="btn-group">
               <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">د{{__('messages.CREATE_NEW_COURSE')}}</a>
               <a href="{{ route('episodes.index') }}" class="btn btn-sm btn-danger">{{__('messages.VIDEO_EPISODE')}}ا</a>
           </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.ARTICLE_TITLE')}}</th>
                    <th>{{__('messages.COMMENT_NO')}}</th>
                    <th>{{__('messages.VIEWED_NO')}}</th>
                    <th>{{__('messages.PARTICIPATE_NO')}}</th>
                    <th>{{__('messages.COURSE_STATUS')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td><a href="{{ $course->path() }}">{{ $course->title }}</a></td>
                        <td>{{ $course->commentCount }}</td>
                        <td>{{ $course->viewCount }}</td>
                        <td>1</td>
                        <td>
                            @if($course->type == 'free')
                                رایگان
                            @elseif($course->type == 'vip')
                                ویژه
                            @else
                                نقدی
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('courses.destroy'  , ['id' => $course->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('courses.edit' , ['id' => $course->id]) }}"  class="btn btn-primary">{{__('messages.EDIT')}}</a>
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
            {!! $courses->render() !!}
        </div>
    </div>
@endsection