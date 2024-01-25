@extends('layout')
@section('content')
    <div>
        @foreach($users as $user)
        <p>Пользователь:{{$user->name}}</p>
                @foreach($poems as $poem)
                @foreach($comments as $comment)
                {{$comment->content}}
                <a href="poems/{{($poem->id)}}">{{$poem->title}}</a>
                @endforeach
                @endforeach
            @endforeach
    </div>
@endsection
