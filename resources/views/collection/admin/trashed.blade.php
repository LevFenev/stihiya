@extends('layout')
@section('content')
    <p>Удалённые сборники</p>
    @foreach($collections as $collection)
        <h2>{{$collection->title}}</h2>
        <h3>Автор:{{$collection->author_id}}</h3>
{{--        <p>{{$poem->content}}</p>--}}
        <p>Дата удаления: {{$collection->deleted_at}}</p>
        <a href="admin/collections/restore/{{$collection->id}}">[Восстановить]</a>
        <br>
    @endforeach

    <button>[<a href="/admin/collections">Назад</a>]</button>
@endsection
