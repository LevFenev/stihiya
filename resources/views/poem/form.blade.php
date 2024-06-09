@extends('layout')
@section('content')
    <form method="post" enctype="multipart/form-data"
          action="/poems/post"> {{--прописать потом метод внутри poemController связанный с формой getPoem--}}
        @csrf
        <div class="form-inner">
            @foreach($poem->getAttributes() as $key=>$attribute)
                @error($key)
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if($key=='content')
                    <label class="poem__form-label">{{__('common.'.$key)}}<textarea name="{{$key}}" id="2" cols="30"
                                             rows="10">{{$attribute}}</textarea></label><br>
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

                    <label {{$display}}>{{__('common.'.$key)}}<input name="{{$key}}" type="{{$type}}" value="{{$attribute}}"></label>
                    <br>
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
@endsection
