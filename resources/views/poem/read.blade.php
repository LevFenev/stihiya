@extends('layout')
@section('content')
<div>
    <p>Стихи:</p>
    <a href="/poems">Общий список стихов</a>
    @foreach($poems as $poem)
        <h2>{{($poem->title)}}</h2>
            <i>{{($poem->author_id)}}</i> <!-- ($user->username)   как-то надо определять айдишник того кто написал стих и вывести имя -->
    <p>{!!str_replace("\n",'<br>',($poem->content))!!}</p>
<br>
    <i>{{($poem->release_year)}}</i>
    @foreach($comments as $comment)
            <h3>{{$comment->username}}</h3>
            <p>{{$comment->created_at}}</p>
            <p>{{$comment->content}}</p>
            <p>Лайки: {{$comment->like_count}}</p>
            <p><a href="comments/delete/{{$comment->id}}">Удалить</a></p>
        @endforeach
        @endforeach
</div>
@endsection
