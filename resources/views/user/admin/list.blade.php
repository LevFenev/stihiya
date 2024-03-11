@extends('layout')
@section('content')
    <div>
        <p>Пользователи</p>
        <ol>
            @foreach($users as $user)

                <li><a href="users/{{$user->id}}">{{$user->name}}</a> [<a href="/admin/users/delete/{{$user->id}}">удалить</a>]</li>
            @endforeach
        </ol>
    </div>
@endsection
