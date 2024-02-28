@extends('layout')
@section('content')
    <div>
        <p>Стихи:
        <ol>
            @foreach($poems as $poem)
                <li><a href="poems/{{($poem->id)}}">{{($poem->title)}}</a> <a href="delete.blade.php">[удалить]</a></li>
            @endforeach
        </ol>
        </p>
    </div>
@endsection
