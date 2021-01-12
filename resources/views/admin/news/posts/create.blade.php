@extends('admin.layouts.app')

@section('title-block')Создание новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание новости</h1>
    </div>
    <form action="{{ route('admin.post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок
            <input name="title" class="form-control" value="{{ old('title') }}" placeholder="Заголовок"></label>
        </div><br>
        <div class="form-group">
            <label for="slug">Url
            <input name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Url"></label>
        </div><br>
        <div class="form-group">
            <label for="category_id">Категория
            <input name="category_id" class="form-control" value="{{ old('category_id') }}" placeholder="Категория"></label>
        </div><br>
        <div class="form-group">
            <label for="text">Текст
                <textarea name="text" class="form-control" placeholder="Текст">{{ old('text') }}</textarea></label>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection
