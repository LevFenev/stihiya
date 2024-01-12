@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
        <li><a href="poems/{id}">{{$poems->title}}</a></li>
        @endforeach
    </ol>
    </p>
</div>
@endsection
