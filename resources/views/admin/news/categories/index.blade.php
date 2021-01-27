@extends('admin.layouts.app')

@section('title-block')Категории новостей@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
    </div>
    <h2>Список категорий</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-success" href="{{ route('admin.categories.edit', $category->id) }}">Ред.</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger ms-1" type="submit">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
