@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.ARTICLES')}}</h2>
            <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary">{{__('messages.SEND_ARTICLE')}}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.ARTICLE_TITLE')}}</th>
                    <th>{{__('messages.COMMENT_NO')}}</th>
                    <th>{{__('messages.VIEWED_NO')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><a href="{{ $article->path() }}">{{ $article->title }}</a></td>
                        <td>{{ $article->commentCount }}</td>
                        <td>{{ $article->viewCount }}</td>
                        <td>
                            <form action="{{ route('articles.destroy'  , ['id' => $article->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('articles.edit' , ['id' => $article->id]) }}"  class="btn btn-primary">{{__('messages.EDIT')}}</a>
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
            {!! $articles->render() !!}
        </div>
    </div>
@endsection