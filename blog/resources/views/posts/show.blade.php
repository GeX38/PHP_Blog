@extends('layouts.app')

@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

@if ($post->published)
    <p>Статус: Опубликована</p>
    <form action="{{ route('posts.unpublish', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit">Снять с публикации</button>
    </form>
@else
    <p>Статус: Не опубликована</p>
    <form action="{{ route('posts.publish', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit">Опубликовать</button>
    </form>
@endif

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
@endsection