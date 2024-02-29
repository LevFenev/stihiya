@extends('layout')
@section('content')
    <div>
        <p>Альбомы:
        <ol>
            @foreach($albums as $album)
                <li>{{$album->title}} [<a href="/albums/delete/{{$album->id}}">удалить</a>]</li>

            @endforeach
        </ol>
        </p>
    </div>
@endsection
