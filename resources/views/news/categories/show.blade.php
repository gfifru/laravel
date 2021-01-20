@extends('layouts.app')

@section('title-block'){{ $category->title }}@endsection

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $category->title }}</h1>
    </div>

    <p><strong>{{ $category->description }}</strong></p>

    @if(!$category)
        <div>Новостей пока нет!</div>
    @endif
    <ul class="list-group list-group-flush">

        @foreach($category->getPosts as $post)
            <li class="list-group-item"><a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
    <br>
    <a class="btn" href="{{ route('categories.index') }}">Назад</a>
@endsection
