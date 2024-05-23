@extends('layout')
@section('content')
    <form action="/likes-form/create" method="post" class="general-form">
        @csrf
        <label for="id">
            ID реакции
            <input name="id" id="reaction_id" type="text">
        </label>
        <label for="reaction_name">
            Название реакции
            <input name="name" id="reaction_name" type="text">
        </label>
        <button type="submit">Создать</button>
    </form>
@endsection
