@extends('layout')
@section('content')
    <div>
        <p>Альбомы:
        <ol>
            @foreach($albums as $album)
                <li>{{$album->title}}</li>

            @endforeach
        </ol>
        </p>
    </div>
@endsection
