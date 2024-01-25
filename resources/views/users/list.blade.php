@extends('layout') <!-- откуда он получает базу данных? / Должен из UserController, но не получает -->
@section('content')
    <div>
        <p>Пользователи</p>
        <ol>
            @foreach($users as $user)
                <h2><a href="users/{id}">{{$user->username}}</a></h2>
            @endforeach
        </ol>
    </div>
@endsection
