@extends('layout')
@section('content')
{{--@guest--}}
{{--    <a href="/login">Войти</a>--}}
{{--@endguest--}}

{{--    @include('menu')--}}
<button style="background-color: red"><a href="/admin/main">Админ</a></button>
<button style="background-color: blue"><a href="/main">Пользователь</a></button>
{{--
кнопки:
Я админ (красный)
Я пользователь (синий)--}}

<ul class="main-menu">
    <li><a href="/users">Пользователи</a></li>
    <li><a href="/poems">Стихи</a></li>
    <li><a href="/collections">Сборники</a></li>
    <li><a href="/songs">Песни</a></li>
    <li><a href="/albums">Альбомы</a></li>
</ul>
@endsection
