@extends('layout')
@section('content')
    <div>
        <ol>
            <a href="/collections">Общий список сборников</a>
            @foreach($collections as $collection)
                <h2>{{$collection->title}}</h2>
                @foreach($poems as $poem)
                    <p>({{$poem->title}}<a href="poems/{{($poem->id)}}"></a></p>
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
