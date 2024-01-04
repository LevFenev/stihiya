@extends('layout')
@section('content')
    <div>
        <p>Стихи:
        <ol>
            @foreach($users as $user)
                <li>{{$users->username}}</li>

            @endforeach
        </ol>
        </p>
    </div>
@endsection
