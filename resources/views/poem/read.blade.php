@extends('layout')
@section('content')
<div>
    <p>Стихи:</p>
    @foreach($poems as $poem)
        <h2>{{($poem->title)}}</h2>
            <i>{{($poem->author_id)}}</i>
    <p>{{($poem->content)}}</p>

    <i>{{($poem->release_year)}}</i>
        @endforeach
</div>
@endsection
