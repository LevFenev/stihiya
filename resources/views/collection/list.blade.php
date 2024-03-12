@extends('layout')
@section('content')
    <div>
        <p>Сборники:</p>
        <ol>
            @foreach($collections as $collection)
                <li>{{$collection->title}} [<a href="/admin/collections/delete/{{$collection->id}}">удалить</a>]</li>

            @endforeach
        </ol>
    </div>
@endsection
