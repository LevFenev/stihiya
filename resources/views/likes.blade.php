@extends('layout')
@section('content')
    <form action="=" >
        <label for="reaction_id">
            ID реакции
            <input id="reaction_id" name="reaction_id" type="text">
        </label>
        <label for="reaction_name">
            Название реакции
            <input id="reaction_name" type="text">
        </label>
        <button type="submit">Создать</button>
    </form>
@endsection
