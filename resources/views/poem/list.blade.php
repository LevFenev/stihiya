@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
        <li><a href="poems/{id}">{{$poem->title}}</a></li>

        @endforeach
    </ol>
    </p>
</div>
@endsection
