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

        <button>[<a href="/admin/poems/trashed">Восстановить стихи({{($deletedPoems)}})</a>]</button>
    </div>
@endsection
