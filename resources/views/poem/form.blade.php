@extends('layout')
@section('content')
    <h3>Желаете опубликовать свой стих?</h3>
    <form action="post">
        <p>Название</p>
        <input type="text">
        <p>Содержание</p>
        <textarea value="Дерзайте!"></textarea>
        <p>Напишите что-нибудь про стих. Например, процесс его создания</p>
        <textarea value="Сидел я на скучном уроке алгебры..."></textarea>
        <!-- вставка файла -->
        <!-- вставка видео -->
        <button type="submit">Опубликовать</button>
    </form>
    @endsection
