<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Новостной сайт')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.header')

    <main class="container">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>