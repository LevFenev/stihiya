@extends('layout')
@section('content')
    <div>
        <h2> Все сборники </h2>
        <ol>
            @foreach($collections as $collection)
                <li><a href="collections/{{$collection->id}}">{{$collection->title}}</a></li>

            @endforeach
        </ol>
    </div>
@endsection
