@extends('layout')
@section('content')
    <p>Уверены, что хотите восстановить этот комментарий?</p>
    @foreach($comments as $comment)
        <p>{{$comment->user_id}}</p>
        <p>{{$comment->content}}</p>
    @endforeach
    <a href="/restore">Да</a>
    <a href="trashed/">Нет</a>
@endsection
