@extends('layout')

@section('title', 'Редактировать статью')

@section('content')
    <h1>Редактировать статью</h1>

    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('articles.update', $article->id) }}" class="auth-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $article->name) }}" required>
        </div>

        <div class="form-group">
            <label for="short_description">Короткое описание:</label>
            <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $article->short_description) }}">
        </div>

        <div class="form-group">
            <label for="content">Содержание:</label>
            <textarea name="content" id="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Дата:</label>
            <input type="date" name="date" id="date" value="{{ old('date', $article->date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="preview_image">Превью (имя файла):</label>
            <input type="text" name="preview_image" id="preview_image" value="{{ old('preview_image', $article->preview_image) }}">
        </div>

        <div class="form-group">
            <label for="full_image">Полное изображение (имя файла):</label>
            <input type="text" name="full_image" id="full_image" value="{{ old('full_image', $article->full_image) }}">
        </div>

        <button type="submit">Сохранить</button>
        <a href="{{ route('articles.show', $article->id) }}" class="btn-cancel">Отмена</a>
    </form>
@endsection