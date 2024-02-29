@extends('layout')
@section('content')
    <p>Удалённые стихи</p>
    @foreach($poems as $poem)
        <p>{{$poem->author_id}}</p>
        <p>{{$poem->title}}</p>
        <p>{{$poem->content}}</p>
        <p>{{$poem->storyline}}</p>
        <a href="restore/{{$poem->id}}">Восстановить</a>
        <br>
        <button>[<a href="/">Назад</a>]</button>
    @endforeach
@endsection
