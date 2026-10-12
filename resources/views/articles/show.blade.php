@extends('layout')

@section('title', $article->name)

@section('content')
    <h1>{{ $article->name }}</h1>
    <p class="date">{{ $article->date->format('d.m.Y') }}</p>

    @if($article->preview_image)
        <img src="{{ asset($article->preview_image) }}" alt="{{ $article->name }}" class="preview" style="max-width: 400px;">
    @endif

    <div class="article-content" style="margin-top: 20px;">
        {!! nl2br(e($article->content)) !!}
    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('articles.edit', $article->id) }}">✎ Редактировать</a> |
        <form method="POST" action="{{ route('articles.destroy', $article->id) }}" style="display:inline;" onsubmit="return confirm('Удалить статью?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">🗑 Удалить</button>
        </form>
        |
        <a href="{{ route('index') }}">← Назад к новостям</a>
    </div>
@endsection