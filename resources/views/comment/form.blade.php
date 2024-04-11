@extends('layout')
<form method="post" action="/comments/post">
    @csrf
    @foreach($comment->getAttributes() as $key=>$attribute)
        @if($key=='content')
            <label>{{$key}}<textarea name="{{$key}}" id="2" cols="30" rows="10">{{$attribute}}</textarea></label><br>
        @else
            @php
                $type='text';
            $display='';
            @endphp

            @if($key=='id' or $key=='created_at' or $key=='updated_at')
                @php
                    $type='hidden';
                  $display='style="visibility: collapse;"'
                @endphp
            @endif

            <label {{$display}}>{{$key}}<input name="{{$key}}" type="{{$type}}" value="{{$attribute}}"></label><br>
        @endif

    @endforeach
    <button type="submit">Отправить</button>
</form>

{{--@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

    <form action="/comment/post" method="post">
        @csrf <!-- в поле записан уникальный ключ к каждой форме, чтобы нельзя было заддосить сайт постоянными запросами -->
        <h3>Хотите оставить комментарий?</h3>
        --}}{{--организовать выбор пользователя (id) с помощью выпадающего списка--}}{{--
        <p>Текст комментария</p>
            <input type="hidden" name="poem_id" value="{{$poem_id}}">
        <textarea name="comment_body"></textarea>
        <button type="submit">Отправить</button>
    </form>
@endsection--}}
