<div class="comment">
    <h3>{{$poem->username()}}</h3>
    <p>{{$comment->created_at}} {{$comment->updated_at}}</p>
    <p>{{$comment->content}}</p>
    <p>Кол-во лайков: {{$comment->like_count}}</p>
    <div class="buttons">
        <button type="submit">Нравится</button>
        <button type="submit">Не нравится</button>
    </div>
</div>
