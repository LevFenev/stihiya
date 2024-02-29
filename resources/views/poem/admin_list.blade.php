@extends('layout')
@section('content')
    <div>
        <p>Стихи:
        <ol>
            @foreach($poems as $poem)
                <li><a href="poems/{{($poem->id)}}">{{($poem->title)}}</a> [<a href="/admin/poems/delete/{{$poem->id}}">удалить</a>]</li>
            @endforeach
        </ol>
        </p>

        <button>[<a href="/">Назад</a>]</button>
    </div>
@endsection
