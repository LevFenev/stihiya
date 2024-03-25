@extends('layout')
@section('content')
    <div>
        <p>Сборники:</p>
        <ol>
            @foreach($collections as $collection)
                <li>{{$collection->title}}</li>

            @endforeach
        </ol>
    </div>
@endsection
