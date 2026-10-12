@extends('layout')

@section('title', 'Создать статью')

@section('content')
    <h1>Создать статью</h1>

    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('articles.store') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="short_description">Короткое описание:</label>
            <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}">
        </div>

        <div class="form-group">
            <label for="content">Содержание:</label>
            <textarea name="content" id="content" rows="6" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Дата:</label>
            <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="preview_image">Превью (имя файла):</label>
            <input type="text" name="preview_image" id="preview_image" value="{{ old('preview_image') }}" placeholder="например, preview.jpg">
        </div>

        <div class="form-group">
            <label for="full_image">Полное изображение (имя файла):</label>
            <input type="text" name="full_image" id="full_image" value="{{ old('full_image') }}" placeholder="например, full.jpeg">
        </div>

        <button type="submit">Создать</button>
        <a href="{{ route('index') }}" class="btn-cancel">Отмена</a>
    </form>
@endsection