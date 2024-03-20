@extends('layout')
@section('content')
    <div>
        <p>Пользователи</p>
        <ol>
            @foreach($users as $user)
                <li><a href="users/{{$user->id}}">{{$user->name}}</a> [<a href="/admin/users/delete/{{$user->id}}">удалить</a>]</li>
                @foreach($user->comments)
                    <h3>{{$comment->username}}</h3>
                    <p>{{$comment->created_at}}</p>
                    <p>{{$comment->content}}</p>
                    <p>{{$comment->poem_id}}</p>
                    <p>Лайки: {{$comment->like_count}}</p>
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
