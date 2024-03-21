@extends('layout')
@section('content')
    <div>
        <h2>Сборник "Пушкин. Избранное"</h2>
        @foreach($poems as $poem)
            {{$poem->title}}
        @endforeach
    </div>
@endsection
