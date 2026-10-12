<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('index') }}" class="logo">IT Новости</a>

        <nav class="nav">
            <a href="{{ route('index') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('contacts') }}">Контакты</a>

            @auth
                <span class="nav-user">Привет, {{ auth()->user()->name }}!</span>
                <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                    @csrf
                    <button type="submit" class="nav-logout">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('signin') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header>