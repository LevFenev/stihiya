@extends('layout')
@section('content')
    <div>
        @foreach($users as $user)
        <p>Пользователь: {{$user->name}}</p>
                @foreach($comments as $comment)
                {{$comment->content}}
                {{$comment->id}}
                @endforeach
            @foreach($poems as $poem)
            <a href="poems/{{($poem->id)}}/">{{$poem->title}}</a>
                @endforeach
            @endforeach
    </div>
@endsection
