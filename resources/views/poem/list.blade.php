@extends('layout')
@section('content')
<div>
    <h2> Все стихи </h2>
    <ol>
    @foreach($poems as $poem)
            <li><a href="/poems/{{($poem->id)}}">{{($poem->title)}}</a></li>
        @endforeach
    </ol>
</div>
@endsection
