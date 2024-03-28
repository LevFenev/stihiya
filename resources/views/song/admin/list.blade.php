@extends('layout')
@section('content')
    <div>
        <p>Все песни:</p>
        <ol>
            @foreach($songs as $song)
                <li>{{$song->title}} [<a href="/songs/delete/{{$song->id}}">удалить</a>]</li>

            @endforeach
        </ol>
    </div>
@endsection
