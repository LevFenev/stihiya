@extends('layout')
@section('content')
    <div>
        <h2>Сборник "Пушкин. Избранное"</h2>
        @foreach($collections->poems as $poem)
            {{$poem->title}}
        @endforeach
    </div>
@endsection
