@extends('admin.layouts.app')

@section('title-block'){{ $category['title'] }}@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $category['title'] }}</h1>
        <p><strong>{{ $category['description'] }}</strong></p>
    </div>

    @if(!$response)
        <div>Новостей пока нет!</div>
    @endif

    @foreach($response as $item)
        <div><a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a></div>
    @endforeach
    <br>
    <a class="btn" href="{{ route('categories.index') }}">Назад</a>
@endsection
