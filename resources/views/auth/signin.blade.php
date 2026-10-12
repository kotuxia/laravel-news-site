@extends('layout')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('signin.post') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Зарегистрироваться</button>
        <a href="{{ route('login') }}" class="btn-cancel">Войти</a>
    </form>
@endsection