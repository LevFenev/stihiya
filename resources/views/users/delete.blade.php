@extends('layout')
@section('content')
    <p>Уверены, что хотите удалить этого пользователя?</p>
    @foreach($users as $user)
        <p>{{$user->username}}</p>
        <p>{{$user->name}}</p>
    @endforeach
    <a href="/delete">Да</a> <!-- delete_user? -->
    <a href="poems/">Нет</a>
@endsection
