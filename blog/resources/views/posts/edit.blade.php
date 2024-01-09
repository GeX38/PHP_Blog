@extends('layouts.app')

@section('content')
    <h1>Редактировать статью</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Заголовок:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>
        <br>
        <label for="content">Контент:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>
        <br>
        <button type="submit">Обновить</button>
    </form>
@endsection