@extends('layout')
@section('content')
    <form action="/comment/post/2" method="post">
    <h3>Хотите оставить комментарий?</h3>
    <p>Текст комментария</p>
        <textarea></textarea>
    <button type="submit">Отправить</button>
    </form>
@endsection
