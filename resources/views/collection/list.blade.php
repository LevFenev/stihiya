@extends('layout')
@section('content')
    <div>
        <h2> Все сборники </h2>
        <ol>
            @foreach($collections as $collection)
                <li>{{$collection->title}}</li>

            @endforeach
        </ol>
    </div>
@endsection
