@extends('layout')
@section('content')
    <div>
        @foreach($collections->poems as $poem)
            <h2>{{$collection->title}}</h2>
            {{$poem->title}}
        @endforeach
    </div>
@endsection
