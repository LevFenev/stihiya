@extends('layout')
@section('content')
    <h2>Публикация сборника</h2>
    <form method="post" enctype="multipart/form-data" action="/collections/post" class="general-form">
        @csrf
        <div class="form-inner">
            @foreach($collection->getAttributes() as $key=>$attribute)
                @error($key)
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if($key=='description')
                    <label><span>{{__('common.'.$key)}}</span>
                        <textarea name="{{$key}}" id="2" cols="30" rows="10">{{$attribute}}</textarea>
                    </label>
                @else
                    @php
                        $type = 'text';
                        $display = '';
                        $id = '';
                    @endphp
                @endif

                @if($key=='id' or $key=='created_at' or $key=='updated_at' or $key=='deleted_at')
                    @php
                        $type='hidden';
                        $display=' style="visibility: collapse;"';
                        $id = 'id="poem_'.$key.'" ';
                    @endphp
                @endif

                @if($key=='cover')
                    @php
                        $type = 'file';
                    @endphp
                @endif

                @if($key!='description')
                    <label {{$display}}> <span>{{__('common.'.$key)}}</span> <input {!!$id!!} name="{{$key}}"
                                                                                    type="{{$type}}"
                                                                                    value="{{$attribute}}"> </label>
                @endif


            @endforeach
            <div id="quickSearch"><input type="text"/></div>
            <div id="inCollection"></div>
            <div id="chooseAuthor"></div>
            <button type="submit">Опубликовать</button>
        </div>
    </form>
@endsection
