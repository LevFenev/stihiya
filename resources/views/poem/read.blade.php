@extends('layout')
@section('content')
    <div>
        @foreach($poems as $poem)
        <p>{{$poem->title}}</p>
        @endforeach
    </div>
@endsection
