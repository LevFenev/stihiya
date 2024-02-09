@extends('layout')
@section('content')
    <p>Удалённые комментарии</p>
    @foreach($comments as $comment)
        <p>{{$comment->content}}</p>
        <a href="/restore">Восстановить</a>
    @endforeach
@endsection
