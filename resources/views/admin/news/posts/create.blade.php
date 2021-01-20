@extends('admin.layouts.app')

@section('title-block')Создание новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание новости</h1>
    </div>
    <form action="{{ route('admin.post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title">Заголовок
                <input style="width: 600px;" name="title" class="form-control" value="{{ old('title') }}" placeholder="Заголовок"></label>
        </div>
        <div class="mb-3">
            <label for="slug">Url
                <input style="width: 600px;" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Url"></label>
        </div>
        <div class="mb-3">
            <label for="category_id">Категория
                <select style="width: 600px;" class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label for="text">Текст
                <textarea style="width: 600px;" name="text" class="form-control" placeholder="Текст">{{ old('description') }}</textarea></label>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection
