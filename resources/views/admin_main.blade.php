@extends('layout')
{{--    @include('menu')--}}
<button style="background-color: red"><a href="/admin/main">Я админ</a></button>
<button style="background-color: blue"><a href="/main">Я пользователь</a></button>
{{--
кнопки:
Я админ (красный)
Я пользователь (синий)--}}

<div>
    <li><a href="/admin/users">Пользователи</a></li>
    <li><a href="/admin/poems">Стихи</a></li>
    <li><a href="/admin/collections">Сборники</a></li>
    <li><a href="/admin/songs">Песни</a></li>
    <li><a href="/admin/albums">Альбомы</a></li>
</div>
