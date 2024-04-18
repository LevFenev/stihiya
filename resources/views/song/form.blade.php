@extends('layout')
<form method="post" enctype="multipart/form-data" action="/songs/post">
    @csrf
    <h2>Вы публикуете: ... </h2>

    {{--@foreach($song as $key=>$attribute)
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

    @endforeach--}}

    <label>
        <span>Название: </span>
        <input type="text" name="title">
    </label>
    <br>
    <label>
        <span>Дата выхода: </span>
        <input type="date" name="release_date">
    </label>
    <br>
    <label>
        <span>Артист: </span>
        <input type="number" name="artist_id">
    </label>
    <br>
    <label>
        <span>Из альбома: </span>
        <input type="number" name="album_id">
    </label>
    <br>
    <label>
        <span>Текст песни: </span>
        <textarea name="lyrics" id="2" cols="30" rows="10"></textarea>
    </label>
    <br>
    <label>
        <span>Описание: </span>
        <textarea name="description" id="3" cols="30" rows="5"></textarea>
    </label>
    <br>
    <label>
        <span>Обложка: </span>
        <input type="file" name="cover">
    </label>
    <br>
    <button type="submit">Опубликовать</button>
    <button type="submit">Сохранить</button>
</form>
