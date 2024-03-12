@extends('layout')
@section('content')
    <div>
        <ol>
            <a href="/admin/collections">Общий список сборников</a>
            @foreach($collections as $collection)
                <h2>{{$collection->title}}</h2>
                <h2>{{$collection->author_id}}</h2> <!-- непонятно есть ли author_id -->
                @foreach($poems as $poem)
                    <p>({{$poem->title}}<a href="admin/poems/{{($poem->id)}}"></a><br>)</p>
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
