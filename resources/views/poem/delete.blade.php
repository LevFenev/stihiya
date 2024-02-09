@extends('layout')
@section('content')
    <p>Уверены, что хотите удалить этот стих?</p>
    @foreach($poems as $poem)
        <p>{{$poem->title}}</p>
        <p>{{$poem->author_id}}</p>
        <p>{{$poem->content}}</p>
    @endforeach
    <a href="/delete">Да</a> <!-- delete_poem? -->
    <a href="poems/">Нет</a>
@endsection
