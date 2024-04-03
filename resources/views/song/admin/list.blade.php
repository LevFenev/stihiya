@extends('layout')
@section('content')
    <div>
        <h2> Все песни </h2>
        <ol>
            @foreach($songs as $song)
                <li>{{$song->title}} [<a href="/songs/delete/{{$song->id}}">удалить</a>]</li>

            @endforeach
        </ol>
    </div>
@endsection
