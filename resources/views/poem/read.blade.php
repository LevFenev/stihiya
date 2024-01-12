@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
        {{($poem->title)}}
            {{($poem->author_id)}}
        {{($poem->content)}}
        {{($poem->year)}}
        @endforeach
    </ol>
    </p>
</div>
@endsection
