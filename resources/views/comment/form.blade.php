@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

    <form action="/comment/post" method="post">
        @csrf <!-- в поле записан уникальный ключ к каждой форме, чтобы нельзя было заддосить сайт постоянными запросами -->
        <h3>Хотите оставить комментарий?</h3>
        <p>Текст комментария</p>
            <input type="hidden" name="poem_id" value="{{$poem_id}}">
        <textarea name="comment_body"></textarea>
        <button type="submit">Отправить</button>
    </form>
@endsection
