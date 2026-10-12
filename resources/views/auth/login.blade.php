@extends('layout')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login.post') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Войти</button>
        <a href="{{ route('signin') }}" class="btn-cancel">Регистрация</a>
    </form>
@endsection