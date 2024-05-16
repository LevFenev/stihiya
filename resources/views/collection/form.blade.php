@extends('layout')
<form method="post" enctype="multipart/form-data" action="/collections/post">
    @csrf
    <div class="form-inner">
        @foreach($collection->getAttributes() as $key=>$attribute)
            key {{$key}} attribute {{$attribute}} <br>
            @error($key)
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if($key=='description')
                <label>{{$key}}
                    <textarea name="{{$key}}" id="2" cols="30" rows="10">{{$attribute}}</textarea>
                </label><br>
            @else
                @php
                    $type = 'text';
                    $display = '';
                @endphp
            @endif

            @if($key=='id' or $key=='created_at' or $key=='updated_at' or $key=='deleted_at')
                @php
                    $type='hidden';
                    $display='style="visibility: collapse;"'
                @endphp
            @endif

            @if($key=='cover')
                @php
                    $type = 'file';
                @endphp
            @endif

            <label {{$display}}> {{$key}} <input name="{{$key}}" type="{{$type}}" value="{{$attribute}}"> </label> <br>

        @endforeach
            <select multiple="multiple" name="inCollection[]" id="inCollection"></select>
            <button type="submit">Опубликовать</button>
    </div>
</form>
