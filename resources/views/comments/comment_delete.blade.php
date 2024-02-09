@extends('layout')
@section('content')
    <p>Уверены, что хотите удалить этот комментарий?</p>
    @foreach($comments as $comment)
    <p>{{$comment->content}}</p>
    @endforeach
    <a href="/delete">Да</a> <!-- delete_comment? -->
    <a href="poems/">Нет</a>
@endsection
