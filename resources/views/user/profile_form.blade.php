@extends('layout')
<form action="#" method="post" target="_blank">
    <h2>Профиль</h2>
    <fieldset>
        <legend>Персональные данные</legend>
        <ul>
            <li>
                <label for="mail">Электронная почта*</label>
                <input type="email" name="mail" value={{@key}} id="name" required>
            </li>
            <li>
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" value={{@key}} id="username">
            </li>
            <li>
                <label for="password">Изменить пароль*</label>
                <input type="password" name="password" id="password" required>
            </li>
        </ul>
    </fieldset>
    <fieldset>
        <legend>Остальное</legend>
        <ul>
            <li>
                <label for="avatar">Фото профиля</label>
                <input type="file" name="avatar" value={{@key}} id="avatar">
            </li>
        </ul>
    </fieldset>
    <div>
        <button type="submit">Внести изменения</button>
    </div>
</form>
