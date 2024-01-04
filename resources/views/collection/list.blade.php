@extends('layout')
@section('content')
    <div>
        <p>Сборники:
        <ol>
            @foreach($collections as $collection)
                <li>{{$collection->title}}</li>

            @endforeach
        </ol>
        </p>
    </div>
@endsection
