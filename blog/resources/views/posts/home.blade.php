@extends('layouts.app')

@section('content')
    <h1>Список всех статей</h1>

    @foreach($publishedPosts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>Статус: {{ $post->published ? 'Опубликована' : 'Не опубликована' }}</p>
            <a href="{{ route('posts.show', $post->id) }}">Подробнее</a>
        </div>
        <hr>
    @endforeach
@endsection