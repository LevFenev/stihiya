@extends('layout')
@section('content')
    <div>
        <p> Все альбомы </p>
        <ol>
            @foreach($albums as $album)
                <li><a href="albums/{{$album->id}}">{{$album->title}}</a></li>

            @endforeach
        </ol>
    </div>
@endsection
