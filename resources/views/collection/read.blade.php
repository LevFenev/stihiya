@extends('layout')
@section('content')
    <div>
        <ol>
            <a href="/collections">Общий список сборников</a>
            @foreach($collections as $collection)
                <h2>{{$collection->title}}</h2>
                @foreach($poems as $poem)
                        <p>({{$poem->title}}<br>)</p>
                    @endforeach
            @endforeach
        </ol>
        </p>
    </div>
@endsection
