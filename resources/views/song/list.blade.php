@extends('layout')
@section('content')
    <div>
        <p>Все песни:</p>
        <ol>
            @foreach($songs as $song)
                <li><a href="songs/{{($song->id)}}">{{($song->title)}}</a></li>

            @endforeach
        </ol>
    </div>
@endsection
