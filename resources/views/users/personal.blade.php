@extends('layout')
@section('content')
    <div>
        @foreach($users as $user)
        <p>Пользователь:{{$user->name}}</p>
        <ol>
                @foreach($poems as $poem)
                @foreach($comments as $comment)
                <li>{{$comment->content}}</li>
                <li>{{$poem->title}}</li> <a href="poems/{{($poem->id)}}"></a>
                @endforeach
                @endforeach
            @endforeach
        </ol>
    </div>
@endsection
