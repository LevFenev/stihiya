@extends('layout')
@section('content')
<div>
    <p>Стихи:</p>
    <a href="/poems">Общий список стихов</a>
    @foreach($poems as $poem)
        <h2>{{($poem->title)}}</h2><h3>Фёдор Тютчев</h3>
    <p>Автор:</p>
        <i>{{$poem->username()}}</i>
    <p>{!!str_replace("\n",'<br>',($poem->content))!!}</p>
<br>
    <p>Год выпуска:</p>
    <i>{{($poem->release_year)}}</i>
    <a href="/comments/post/{{$poem->id}}">Добавить комментарий</a>
    @foreach($poem->comments as $comment)
        @include('comments')
        @endforeach
        @endforeach
</div>
@endsection
