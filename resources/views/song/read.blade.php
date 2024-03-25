@extends('layout')
@section('content')
    <div>
        <p>Песни:</p>
        <a href="/songs">Общий список песен</a>
        @foreach($songs as $song)
            <h2>{{($song->title)}}</h2>
            @if(isset($song->user))
                <i>{{$song->user->name}}</i>
            @endif
            <p>{!!str_replace("\n",'<br>',($song->lyrics))!!}</p>
            <br>
            <i>{{($song->release_year)}}</i>
            <i>{{($song->release_date)}}</i>
            <i>{{($song->cover)}}</i>
            <i>{{($song->credits)}}</i>

            <a href="/comments/post/{{$song->id}}">Добавить комментарий</a>
            @foreach($song->comments as $comment)
                <h3>{{$comment->username}}</h3>
                <p>{{$comment->created_at}}</p>
                <p>{{$comment->content}}</p>
                <p>Лайки: {{$comment->like_count}}</p>
                {{-- <p><a href="/comment/delete/{{$comment->id}}">Удалить</a></p> это админская вещь --}}
            @endforeach

        @endforeach
    </div>
@endsection
