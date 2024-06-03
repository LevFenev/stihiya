<!-- редачить лайки - показать кол-во стихов комментов сборников на которых использовали реакцию -->

@foreach($likes as $like)
    <input type="text" value="{{$like->name}}">
    <input type="text" value="{{$like->id}}">
@endforeach
<button><a href="/likes-edit/done">Изменить все</a></button>
<a href="/main">Назад</a>
