@extends('layout')
@section('content')
    <form method="post" action="/reg">
        @csrf
        <div class="form-inner">
            @foreach($user->getAttributes() as $key=>$attribute)
                {{$key}} {{$attribute}} <br>
                @error($key)
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if($key=='bio')
                    <label>{{$key}}
                        <textarea name="{{$key}}" id="2" cols="30" rows="10">
                        {{$attribute}}
                    </textarea>
                    </label><br>
                @else
                    @php
                        $type = 'text';
                        $display = '';
                    @endphp
                @endif

                @if($key=='id' or $key=='created_at' or $key=='updated_at')
                    @php
                        $type='hidden';
                        // $display='style="visibility: collapse;"'
                    @endphp

                @endif
                <label {{$display}}> {{$key}} <input name="{{$key}}" type="{{$type}}" value="{{$attribute}}"> </label>
                <br>

            @endforeach
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>
@endsection

{{--
@include('menu')
<div>
    @yield('content')
</div>

<form action="post/user" method="post" target="_blank">
    <h2>Регистрация</h2>
    <fieldset>
        <legend>Персональные данные</legend>
        <ul>
            <li>
                <label for="mail">Электронная почта*</label>
                <input type="email" name="mail" placeholder="ivanov@gmail.com" id="name" required>
            </li>
            <li>
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" placeholder="Иван Иванов" id="username">
            </li>
            <li>
                <label for="password">Пароль*</label>
                <input type="password" name="password" id="password" required>
            </li>
            <div>
                <button type="submit">Зарегистрироваться</button>
            </div>
            <p>* - Обязательные поля</p>
        </ul>
    </fieldset>
</form>
--}}
