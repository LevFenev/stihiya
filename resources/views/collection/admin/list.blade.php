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
        <button><a href="/admin/collections/trashed">Восстановить сборники({{($deletedCollections)}})</a></button>
    </div>
@endsection
