@extends('layout')

@section('title', 'Контакты')

@section('content')
    <h1>Контакты</h1>

    @if(count($contacts) > 0)
        <ul class="contacts-list">
            @foreach($contacts as $key => $value)
                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
            @endforeach
        </ul>
    @else
        <p>Контакты пока не добавлены.</p>
    @endif
@endsection