@extends('layouts.app')

@section('content')
    
<h1>Создать статью</h1>

<form action="{{ route('posts.store') }}" method="post">
    @csrf

    <label for="title">Заголовок:</label>
    <input type="text" name="title" required>

    <br>

    <label for="content">Контент:</label>
    <textarea name="content" required></textarea>

    <br>

    <button type="submit" name="action" value="save">Создать</button>
</form>
@endsection
