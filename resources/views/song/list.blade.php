@extends('layout')
@section('content')
    <div>
        <p>Все песни:</p>
        <ol>
            @foreach($songs as $song)
                <li>{{$song->title}}</li>

            @endforeach
        </ol>
    </div>
@endsection
