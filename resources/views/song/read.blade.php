@extends('layout')
@section('content')
    <div>
        <a href="/songs">Все песни</a>
        @foreach($songs as $song)
            <h2>{{($song->title)}}</h2>
            @foreach($song->poems as $poem) {{-- for each in case there are several versions--}}
            <a href="/poems/{{$poem->id}}">Оригинальный стих</a>
            <a href="/songs/{{$poem->song}}">{{$poem->song}}</a>
            @endforeach
            <p>Артист(ы): <i>{{$song->username()}}</i></p>
            <p>{!!str_replace("\n",'<br>',($song->lyrics))!!}</p>
            <p> Дата выхода: <i>{{($song->release_date)}}</i></p>
            <i>{{($song->release_year)}}</i>
            <i>{{($song->cover)}}</i>
            <i>{{($song->credits)}}</i>
            <div class="buttons">
                <a href="/songs/post/{{$song->id}}">Редактировать песню</a><br>
                <a href="/comments/post/{{$song->id}}">Добавить комментарий</a>
            </div>
            @foreach($song->comments as $comment)
                @include('comments')
            @endforeach

        @endforeach
    </div>
@endsection
