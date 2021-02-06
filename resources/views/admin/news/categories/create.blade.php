@extends('admin.layouts.app')

@section('title-block')Создание категории@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание категории</h1>
    </div>
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title">Название
                <input style="width: 600px;" name="title" class="form-control" value="{{ old('title') }}" placeholder="Название"></label>
        </div>
        <div class="mb-3">
            <label for="slug">URL
                <input style="width: 600px;" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="URL"></label>
        </div>
        <div class="mb-3">
            <label for="description">Описание
                <textarea style="width: 600px;" name="description" class="form-control">{{ old('description') }}</textarea></label>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection
