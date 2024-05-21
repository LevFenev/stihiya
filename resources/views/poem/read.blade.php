@extends('layout')
@section('content')
    <div>
        <a href="/poems">Все стихи</a>
        @foreach($poems as $poem)
            <h2>{{($poem->title)}}</h2>
            @foreach($poem->songs as $song)
                <a href="/songs/{{$poem->id}}">Ссылка на аудиозапись</a>
            @endforeach
            <p>Автор: <i>{{$poem->username()}}</i></p>
            <p>{!!str_replace("\n",'<br>',($poem->content))!!}</p>
            <p>Год выпуска: <i>{{($poem->release_year)}}</i></p>
            <div class="buttons">
                <a href="/poems/post/{{$poem->id}}">Редактировать стих</a><br>
                <a href="/poem/{{$poem->id}}/comments/post/">Добавить комментарий</a>
            </div>
            <div class="like-buttons" data-id="{{$poem->id}}" data-element_name="poem">
                <div class="like" data-rid="1">&hearts;</div>
                <div class="dislike" data-rid="2">&#x1F494;</div>
            </div>

            @foreach($poem->comments as $comment)
                @include('comments')
            @endforeach
        @endforeach
    </div>

@endsection
