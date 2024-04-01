@extends('layout')
    <form method="post" action="/left"> {{--прописать потом метод внутри poemController связанный с формой getPoem--}}
        @csrf
    @foreach($poem as $key=>$attribute)
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
        <button type="submit">Опубликовать</button>
    </form>
