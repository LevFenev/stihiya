@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
            <li>{{($poem->title)}}</li>
        @endforeach
    </ol>
    </p>
</div>
@endsection
