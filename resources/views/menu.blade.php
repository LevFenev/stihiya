<nav>
    <!-- Well begun is half done. - Aristotle -->
    <ul class="main-menu">
        {{--<li><a href="/users">Пользователи</a></li>
        <li><a href="/poems">Стихи</a></li>
        <li><a href="/collections">Сборники</a></li>
        <li><a href="/songs">Песни</a></li>
        <li><a href="/albums">Альбомы</a></li>--}}
        <li><a href="/main">Главная</a></li>
        <li><a href="/forms">Формы</a></li>
        @guest
            <li><a href="/reg">Регистрация</a></li>
            <li><a href="/login">Логин</a></li>
        @endguest
        @auth
            <li><a href="/logout">Выйти</a></li>
        @endauth
        <li><a href="/likes">Выйти</a></li>
    </ul>
</nav>
