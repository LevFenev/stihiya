@extends('layout')
@section('content')
<div class="forms_menu">
    <p>Что вы хотите опубликовать?</p>
    <ul class="main-menu">
        <li><a href="/users/post/">Пользователь</a></li>
        <li><a href="/poems/post/">Стих</a></li>
        <li><a href="/collections/post/">Сборник</a></li>
        <li><a href="/songs/post/">Песня</a></li>
        <li><a href="/albums/post/">Альбом</a></li>
    </ul>
</div>
@endsection
