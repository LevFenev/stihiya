@extends('layout')
@section('content')
    <div>
        <p>Сборники:
        <ol>
            @foreach($collections as $collection)
                <h2>{{$collection->title}}</h2>
                <li>{{$collection->id}}</li>
            @endforeach
        </ol>
        </p>
    </div>
@endsection
