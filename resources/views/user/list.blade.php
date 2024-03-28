@extends('layout') <!-- откуда он получает базу данных? / Должен из UserController, но не получает -->
@section('content')
    <div>
        <p>Пользователи</p>
        <ol>
            @foreach($users as $user)
                <h2><a href="users/{{$user->id}}">{{$user->name}}</a></h2>
                @foreach($user->comments as $comment)
                    @include('poem.comments')
            @endforeach
            @endforeach
        </ol>
    </div>
@endsection
