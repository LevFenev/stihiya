@extends('layout')
@section('content')
<div>
    <p>Стихи:</p>
    <a href="/poems">Общий список стихов</a>
    @foreach($poems as $poem)
        <h2>{{($poem->title)}}</h2><h3>Фёдор Тютчев</h3>
            <i>{{$poem->user->name}}</i>
            <!-- ($user->username)   как-то надо определять айдишник того кто написал стих и вывести имя -->
    <p>{!!str_replace("\n",'<br>',($poem->content))!!}</p>
<br>
    <i>{{($poem->release_year)}}</i>
    <a href="/comments/post/{{$poem->id}}">Добавить комментарий</a>
    @foreach($poem->comments as $comment)
        @include('comments')
            {{--<h3>{{$comment->username}}</h3>
            <p>{{$comment->created_at}}</p>
            <p>{{$comment->content}}</p>
            <p>Лайки: {{$comment->like_count}}</p>--}}
        @endforeach
        @endforeach
</div>
@endsection
