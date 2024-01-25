@extends('layout') <!-- откуда он получает базу данных? / Должен из UserController, но не получает -->
@section('content')
    <div>
        <p>Пользователи и их стихи:</p>
        <ol>
            @foreach($users as $user)
                <h2>{{$user->username}}</h2>
                @foreach($poems as $poem)
                    <li>{{$poem->title}}</li> <a href="poems/{{($poem->id)}}"></a>
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
