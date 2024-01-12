@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
            <li><a href="poem.read/{{($poem->id)}}">{{($poem->title)}}</a></li>
        @endforeach
    </ol>
    </p>
</div>
@endsection
