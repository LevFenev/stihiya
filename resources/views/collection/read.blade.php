@extends('layout')
@section('content')
    <div>
        <a href="/collections">Общий список сборников</a>
        <h2>{{$collection->title}}</h2>
        @foreach($collection->poems as $poem)
            <p><a href="/poems/{{($poem->id)}}">{{$poem->title}}</a></p>
        @endforeach
    </div>
@endsection
