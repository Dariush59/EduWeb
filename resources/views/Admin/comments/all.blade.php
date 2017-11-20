@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.ALL_COMMENTS')}}</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.NAME_OF_USER')}}</th>
                    <th>{{__('messages.COMMENT_TEXT')}}</th>
                    <th>{{__('messages.RELATED_COMMENT')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td><a href="{{ $comment->commentable->path() }}">{{  $comment->commentable->title }}</a></td>
                        <td>
                            <form action="{{ route('comments.destroy'  , ['id' => $comment->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
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
            {!! $comments->render() !!}
        </div>
    </div>
@endsection