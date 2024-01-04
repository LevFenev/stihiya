@extends('layout')
@section('content')
<div>
    <p>Стихи:
    <ol>
    @foreach($poems as $poem)
        <li>{{$poem->title}}</li>

        @endforeach
    </ol>
    </p>

    <p>Юзеры:
    <ol>
    @foreach($users as $user)
        <li>{{$users->name}}</li>

        @endforeach
    </ol>
    </p>
</div>
@endsection
