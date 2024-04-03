@extends('layout')
@section('content')
    <div>
        <p> Все альбомы </p>
        <ol>
            @foreach($albums as $album)
                <li>{{$album->title}}</li>

            @endforeach
        </ol>
    </div>
@endsection
