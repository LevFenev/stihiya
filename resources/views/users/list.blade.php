@extends('layout')
@section('content')
    <div>
        <p>Юзеры:</p>
        <ol>
            @foreach($users as $user)
                <li>{{$user->username}}</li>

            @endforeach
        </ol>
    </div>
@endsection
