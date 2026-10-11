@extends('layout')

@section('title', 'Галерея')

@section('content')
    <h1>Галерея</h1>

    @if($image)
        <img src="{{ asset($image) }}" alt="Изображение" class="full-image">
    @else
        <p>Изображение не найдено.</p>
    @endif

    <p><a href="{{ route('index') }}">← Назад к новостям</a></p>
@endsection