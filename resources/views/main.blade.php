@extends('layout')
{{--    @include('menu')--}}
    <button style="background-color: red"><a href="/admin/main">Я админ</a></button>
    <button style="background-color: blue"><a href="/main">Я пользователь</a></button>
{{--
кнопки:
Я админ (красный)
Я пользователь (синий)--}}

<div>
    <li><a href="/users">Пользователи</a></li>
    <li><a href="/poems">Стихи</a></li>
    <li><a href="/collections">Сборники</a></li>
    <li><a href="/songs">Песни</a></li>
    <li><a href="/albums">Альбомы</a></li>
</div>
