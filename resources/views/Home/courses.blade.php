@extends('Home.master')


@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{ $course->title }}</h1>

        <!-- Author -->
        <p class="lead small">
            {{__('messages.WITH')}} <a href="#">{{ $course->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span>{{__('messages.PUBLISHED_AT')}}</p> {{-- TODO add date--}}

        <hr>
        <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
               poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
            <source src="{{ \App\Episode::find(1) }}" type='video/mp4'> {{--  \App\Episode::find(1)->download()  --}}
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
        <!-- Post Content -->
       <div id="content">
           {!! $course->body !!}
       </div>
        <hr>

        @if(auth()->check())
           @if($course->type == 'vip')
                @if(! user()->isActive())
                    <div class="alert alert-danger" role="alert">{{__('messages.TO_SHOW_ALL')}}</div>
                @endif
           @elseif($course->type == 'cash')
               @if(! user()->checkLearning($course))
                    <div class="alert alert-danger" role="alert">{{__('messages.BUY_COURSE')}}</div>
                @endif
           @endif
        @else
            <div class="alert alert-danger" role="alert">{{_('messages.MUST_BE_LOGGED')}}</div>
        @endif

        <h3>{{__('messages.COURSE_EPISODES')}}</h3>
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th>{{__('messages.EPISODE_NO')}}</th>
                    <th>{{__('messages.EPISODE_TITLE')}}</th>
                    <th>{{__('messages.EPISODE_TIME')}}</th>
                    <th>{{__('messages.DOWNLOAD')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->episodes()->latest()->get() as $episode)
                    <tr>
                        <th>{{ $episode->number }}</th>
                        <td>{{ $episode->title }}</td>
                        <td>{{ $episode->time }}</td>
                        <td>
                            <a href="{{ $episode->download() }}"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody> </table>
        <!-- Blog Comments -->

        @include('Home.layouts.comment' , ['comments' => $comments , 'subject' => $course])
    </div>

    <!-- Blog Sidebar Widgets Column -->

        <div class="col-md-4">
            {{--@if(! auth()->user()->checkLearning($course))--}}
                 {{--<div class="well">--}}
                    {{--برای استفاده از این دوره نیاز است این دوره را با مبلغ ۱۰۰۰۰ تومان خریداری کنید--}}
                    {{--<form action="/course/payment" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input type="hidden" name="course_id" value="{{ $course->id }}">--}}
                        {{--<button type="submit" class="btn btn-success">خرید دوره</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--@endif--}}

        @if(auth()->check())
            @if($course->type == 'vip')
                @if(! user()->isActive())
                    <div class="well"><a href="{{ route('user.panel.vip') }}">{{__('messages.MUST_BE_VIP')}}</a></div>
                @endif
            @elseif($course->type == 'cash')
                @if(! user()->checkLearning($course))
                        <div class="well">
                            {{__('messages.MUST_TO_PAY')}}
                            {{-- TODO PAYMET PRICE--}}
                            <form action="/course/payment" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-success">{{__('messages.BUY_THE_COURSE')}}</button>
                            </form>
                        </div>
                @endif
            @endif
        @else
            <div class="well">{{__('messages.MUST_BE_LOGGED')}}</div>
        @endif
        <!-- Blog Search Well -->
        <div class="well">
            <h4>جستجو در سایت</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>{{__('messages.WALL')}}</h4>
            <p>{{__('messages.WALL_TEXT')}}</p>
        </div>

    </div>

@endsection