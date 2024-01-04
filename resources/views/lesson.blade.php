@extends('layout')
@section('content')
<div>
    <p>Hello
    <ol>
    @foreach($poets as $poet)
        <li>{{$poet->username}}</li>

        @endforeach
    </ol>
    </p>
</div>
@endsection
