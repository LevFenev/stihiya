@extends('layout') <!-- откуда он получает базу данных? / Должен из UserController, но не получает -->
@section('content')
    <div>
        <p>Пользователи</p>
        <ol>
            @foreach($users as $user)
                <h2><a href="users/{{$user->id}}">{{$user->name}}</a></h2>
                @foreach($user->comments)
                    <h3>{{$comment->username}}</h3>
                    <p>{{$comment->created_at}}</p>
                    <p>{{$comment->content}}</p>
                    <p>{{$comment->poem_id}}</p>
                    <p>Лайки: {{$comment->like_count}}</p>
            @endforeach
        </ol>
    </div>
@endsection
