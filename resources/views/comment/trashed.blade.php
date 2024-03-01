@extends('layout')
@section('content')
    <p>Удалённые комментарии</p>
    @foreach($comments as $comment)
        <p>Пользователь: {{$comment->user_id}}</p>
        <p>Содержание: {{$comment->content}}</p>
        <p>Дата публикации: {{$comment->created_at}}</p>
        <p>Дата удаления: {{$comment->deleted_at}}</p>
        <a href="restore/{{$comment->id}}">[Восстановить]</a>
        <br>
    @endforeach
@endsection
