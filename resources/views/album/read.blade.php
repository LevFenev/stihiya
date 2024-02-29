@extends('layout')
@section('content')
    <div>
        <p>Стихи:</p>
        <a href="/albums">Общий список альбомов</a>
        @foreach($albums as $album)
            <h2>{{($album->title)}}</h2>
            <i>{{($album->artist_id)}}</i> <!-- ($user->username)   как-то надо определять айдишник того кто написал стих и вывести имя -->
            <p>{!!str_replace("\n",'<br>',($album->content))!!}</p> {{-- что за str replace? --}}
            <br>
            <i>{{($album->release_year)}}</i>
            <a href="/comment/post/{{$album->id}}">Добавить комментарий</a>
            @foreach($comments as $comment)
                <h3>{{$comment->username}}</h3>
                <p>{{$comment->created_at}}</p>
                <p>{{$comment->content}}</p>
                <p>Лайки: {{$comment->like_count}}</p>
                {{-- <p><a href="/comment/delete/{{$comment->id}}">Удалить</a></p> это админская вещь --}}
            @endforeach
        @endforeach
    </div>
@endsection
