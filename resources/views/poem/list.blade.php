@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
            <li>{{print_r($poem->title)}}</li>
        @endforeach
    </ol>
    </p>
</div>
@endsection
