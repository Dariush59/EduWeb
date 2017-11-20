@extends('Home.master')

@section('content')

    <form action="/courses">
        <div class="form-group col-md-3">
            <select name="type" class="form-control">
                <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>{{__('messages.ALL_COURSES')}}</option>
                <option value="vip" {{ request('type') == "vip" ? 'selected' : '' }}>{{__('messages.VIP')}}</option>
                <option value="cash" {{ request('type') == "cash" ? 'selected' : '' }}>{{__('messages.CASH')}}</option>
                <option value="free" {{ request('type') == "free"  ? 'selected' : '' }}>{{__('messages.FREE')}}</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <select name="category" class="form-control">
                <option value="all">{{__('messages.ALL_CATEGORY')}}</option>
                @foreach(\App\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-3">
            <label class="checkbox-inline">
                <input type="checkbox" name="order" value="1" {{ request('order') == '1' ? 'checked'  : ''}}>{{__('messages.ASC')}}
            </label>
        </div>

        <div class="form-group col-md-3">
            <button class="btn btn-danger" type="submit">{{__('messages.FILTER')}}</button>
        </div>
    </form>

    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h3>{{__('messages.LATEST_COURSES')}}</h3>
        </div>
    </div>
    <div class="row ">

        @foreach($courses as $course)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ $course->images['thumb'] }}" alt="">
                    <div class="caption">
                        <h3><a href="{{ $course->path() }}">{{ $course->title }}</a></h3>
                        <p>{{ str_limit($course->description , 120) }}</p>
                        <p>
                            <a href="{{ $course->path()  }}" class="btn btn-primary">{{__('messages.BUY')}}</a> <a href="{{ $course->path()  }}" class="btn btn-default">{{__('messages.MORE')}}</a>
                        </p>
                    </div>
                    <div class="ratings">
                        <p class="pull-left">{{ $course->viewCount }} {{__('messages.HOME.VIEWED')}}</p>
                        <p class="pull-left"> {{__('messages.HOME.VIEWED')}}</p>{{-- TODO {{  Redis::get("views.{$course->id}.courses") }} --}}
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    {!! $courses->appends(['type' => request('type') , 'order' => request('order') , 'category' => request('category')])->render() !!}
@endsection