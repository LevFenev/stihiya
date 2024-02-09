@extends('layout')
@section('content')
    <p>Удалённые комментарии</p>
    @foreach($comments as $comment)
        <p>{{$comment->user_id}}</p>
        <p>{{$comment->content}}</p>
        <a href="comments/restore/{{$id}}">Восстановить</a>
        <br>
    @endforeach
@endsection
