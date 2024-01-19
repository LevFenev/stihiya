@extends('layout')
@section('content')
    <div>
        <p>Сборники:
        <ol>
            @foreach($collections as $collection)
                <li><a href="collections/{{($collection->id)}}">{{($collection->title)}}</a></li>
                <li><a href="poems/{{($poems->id)}}">{{($poems->title)}}</a><br></li>
            @endforeach
        </ol>
        </p>
    </div>
@endsection
