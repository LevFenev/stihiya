@extends('layout')
@section('content')
    <div>
        <p>Пользователи и их стихи:</p>
        <ol>
            @foreach($users as $user)
                <h2>{{$user->username}}</h2>
                @foreach($poems as $poem)
                    <li>{{$poem->title}}</li>
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
