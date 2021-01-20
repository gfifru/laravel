@extends('admin.layouts.app')

@section('title-block')Новости@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <a class="btn btn-success" href="{{ route('admin.post.create') }}">Добавить новость</a>
    </div>

    <h2>Список новостей</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Категория</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category_title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->status }}</td>
                <td><a href="{{ route('admin.post.edit', $post->id) }}">Ред.</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
