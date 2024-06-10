@extends('layout')
@section('content')
<div class="registration_wrapper">
{{--    <button id="click-me" type="submit">click me</button>--}}
    <form method="post" action="/login/post">
        @csrf
        <div class="form-inner">

            <label>
                Логин
                <br>
                <input name="email" type="email">
            </label>
            <br>
            <label for="password">
                Пароль
                <br>
                <input name="password" type="password">
            </label>

            <div class="form--submit--button">
                <button type="submit">Войти</button>
            </div>

        </div>
    </form>
</div>
@endsection
