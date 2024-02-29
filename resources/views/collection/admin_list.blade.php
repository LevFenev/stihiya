@extends('layout')
@section('content')
    <div>
        <p>Сборники:
        <ol>
            @foreach($collections as $collection)
                <li>{{$collection->title}} [<a href="/collections/delete/{{$collection->id}}">удалить</a>]</li>

            @endforeach
        </ol>
        </p>
    </div>
@endsection
