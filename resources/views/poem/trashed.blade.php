@extends('layout')
@section('content')
    <p>Удалённые стихи</p>
    @foreach($poems as $poem)
        <h2>{{$poem->title}}</h2>
        <h3>Автор:{{$poem->author_id}}</h3>
        <p>{{$poem->content}}</p>
        <p>История написания: {{$poem->storyline}}</p>
        <p>Дата удаления:{{$poem->deleted_at}}</p>
        <a href="restore/{{$poem->id}}">[Восстановить]</a>
        <br>
    @endforeach

    <button>[<a href="/admin/poems">Назад</a>]</button>
@endsection
