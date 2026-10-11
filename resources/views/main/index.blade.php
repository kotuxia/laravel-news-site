@extends('layout')

@section('title', 'Главная')

@section('content')
    <h1>Новости</h1>

    @forelse($articles as $article)
        <article class="news-item">
            <a href="{{ route('gallery', ['file' => $article['full_image']]) }}">
                <img src="{{ asset($article['preview_image']) }}"
                     alt="{{ $article['name'] }}"
                     class="preview">
            </a>

            <h2>{{ $article['name'] }}</h2>
            <p class="date">{{ $article['date'] }}</p>

            <p>{{ $article['shortDesc'] ?? \Illuminate\Support\Str::limit($article['desc'], 150) }}</p>

            <a href="{{ route('gallery', ['file' => $article['full_image']]) }}">
                Подробнее →
            </a>
        </article>
    @empty
        <p>Новостей пока нет.</p>
    @endforelse
@endsection