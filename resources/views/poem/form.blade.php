@extends('layout')
<form method="post" enctype="multipart/form-data" action="/poems/post"> {{--прописать потом метод внутри poemController связанный с формой getPoem--}}
    @csrf
    <div class="form-inner">
    @foreach($poem->getAttributes() as $key=>$attribute)
            @error($key)
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{--@if('author_id' || 'publisher_id')
                <label for="author_id">Выберите пользователя:</label>
                <select name="author_id" id="id">
                    @foreach()
                    <option value={{"$user->id"}}>Rigatoni</option>
                    <option value="dave">Dave</option>
                    <option value="pumpernickel">Pumpernickel</option>
                    <option value="reeses">Reeses</option>
                </select>
            @endif--}}
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

            @if($key=='photo' or $key=='video')
                @php
                    $type = 'file';
                @endphp
            @endif

        @endforeach
        <input type="submit" value="Опубликовать">
{{--        <input type="submit" value="Сохранить">--}}{{--надо проверить нажимает ли пользователь на кнопку и после нажатия сохранить стих--}}
    </div>
</form>


{{--@extends('layout')
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
    @endsection--}}
