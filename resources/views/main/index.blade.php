@extends('layout')

@section('title', 'Главная')

@section('content')
    <h1>Новости</h1>
    <p><a href="{{ route('articles.create') }}" class="btn-create">+ Создать статью</a></p>

    @forelse($articles as $article)
        <article class="news-item">
            <a href="{{ route('gallery', ['file' => $article->full_image]) }}">
                <img src="{{ asset($article->preview_image) }}"
                     alt="{{ $article->name }}"
                     class="preview">
            </a>

            <h2>{{ $article->name }}</h2>
            <p class="date">{{ $article->date->format('d.m.Y') }}</p>

            <p>{{ $article->short_description ?? \Illuminate\Support\Str::limit($article->content, 150) }}</p>

            <a href="{{ route('gallery', ['file' => $article->full_image]) }}">
                Подробнее →
            </a>
            <div class="article-actions">
                <a href="{{ route('articles.show', $article->id) }}">Просмотр</a> |
                <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a> |
                <form method="POST" action="{{ route('articles.destroy', $article->id) }}" style="display:inline;" onsubmit="return confirm('Удалить?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Удалить</button>
                </form>
            </div>
        </article>
    @empty
        <p>Новостей пока нет.</p>
    @endforelse
        {{-- Пагинация --}}
    <div class="pagination">
        {{ $articles->links() }}
    </div>
@endsection