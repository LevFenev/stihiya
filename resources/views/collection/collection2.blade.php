@extends('layout')
@section('content')
    <div>
        <h2>{{$collection->title}}</h2>
        @foreach($collection->poems as $poem)
            {{$poem->title}}
        @endforeach
    </div>
@endsection
