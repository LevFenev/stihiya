@extends('layout')
@section('content')
    <div>
        @foreach($users as $user)
        <p>Пользователь:{{$user->name}}</p>
        <ol>
                @foreach($poems as $poem)
                @foreach($comments as $comment)
                <li>{{$comment->content}}</li>
                <li><a href="poems/{{($poem->id)}}">{{$poem->title}}</a></li>
                @endforeach
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
