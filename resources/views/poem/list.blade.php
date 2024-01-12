@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
        {{print_r($poem)}}
        @endforeach
    </ol>
    </p>
</div>
@endsection
