@extends('admin.layouts.app')

@section('title-block')Редактирование источника@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование источника</h1>
    </div>
    <form action="{{ route('admin.sources.update', $source) }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name">Название
                <input type="text" style="width: 600px;" name="name" class="form-control" value="{{ $source->name }}" placeholder="Название"></label>
        </div>
        <div class="mb-3">
            <label for="url">URL
                <input type="text" style="width: 600px;" name="url" class="form-control" value="{{ $source->url }}" placeholder="URL"></label>
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection
