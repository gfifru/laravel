@extends('layouts.app')

@section('title-block'){{ $category['title'] }}@endsection

@section('content')
    <h1>{{ $category['title'] }}</h1>
    <p><strong>{{ $category['description'] }}</strong></p>

    @if(!$response)
        <div>Новостей пока нет!</div>
    @endif

    @foreach($response as $item)
        <div><a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a></div>
    @endforeach
    <br>
    <a class="btn" href="{{ route('categories.index') }}">Назад</a>
@endsection
