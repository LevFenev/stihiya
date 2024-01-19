@extends('layout')
@section('content')
    <div>
        <ol>
            @foreach($collections as $collection)
                <h2>{{$collection->title}}</h2>
                @foreach($poems as $poem)
                    @foreach($poem as $single_poem)
                        <p>({{$single_poem->title}}<br>)</p>
                    @endforeach
                    @endforeach
            @endforeach
        </ol>
        </p>
    </div>
@endsection
