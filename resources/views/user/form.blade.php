@extends('layout')
@section('content')
    <h2>Редактирование профиля</h2>
    <form method="post" enctype="multipart/form-data" action="/users/post">
        @csrf
        <div class="form-inner">
            @foreach($user->getAttributes() as $key=>$attribute)
                key {{$key}} attribute {{$attribute}} <br>
                @error($key)
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if($key=='bio')
                    <label>{{$key}}
                        <textarea name="{{$key}}" id="2" cols="30" rows="10">{{$attribute}}</textarea>
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
                        $display='style="visibility: collapse;"'
                    @endphp
                @endif

                @if($key=='avatar')
                    @php
                        $type = 'file';
                    @endphp
                @endif

                <label {{$display}}> {{$key}} <input name="{{$key}}" type="{{$type}}" value="{{$attribute}}"> </label>
                <br>

            @endforeach
            <button type="submit">Опубликовать</button>
        </div>
    </form>
@endsection
