@extends('admin.layouts.app')

@section('title-block')Новости@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Добавить новость</a>
    </div>

    <h2>Список новостей</h2>

    <ul class="list">
        @foreach($posts as $post)
            <li>{{ $post['title'] }}</li>
        @endforeach
    </ul>

@endsection
