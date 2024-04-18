@include('menu')
<div>
    @yield('content')
</div>

<form action="#" method="post" target="_blank">
    <h2>Регистрация</h2>
    <fieldset>
        <legend>Персональные данные</legend>
        <ul>
            <li>
                <label for="mail">Электронная почта*</label>
                <input type="email" name="mail" placeholder="ivanov@gmail.com" id="name" required>
            </li>
            <li>
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" placeholder="Иван Иванов" id="username">
            </li>
            <li>
                <label for="password">Пароль*</label>
                <input type="password" name="password" id="password" required>
            </li>
            <div>
                <button type="submit">Зарегистрироваться</button>
            </div>
            <p>* - Обязательные поля</p>
        </ul>
    </fieldset>
</form>
