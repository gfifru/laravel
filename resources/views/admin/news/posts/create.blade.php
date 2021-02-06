@extends('admin.layouts.app')

@section('title-block')Создание новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание новости</h1>
    </div>
    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Заголовок
                <input type="text" style="width: 600px;" name="title" class="form-control" value="{{ old('title') }}" placeholder="Заголовок"></label>
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
{{--        <div class="mb-3">--}}
{{--            <label for="image">Изображение--}}
{{--                <input type="file" style="width: 600px;" name="image" class="form-control" value="{{ old('image') }}"></label>--}}
{{--        </div>--}}
        <div class="mb-3">
            <label for="description">Текст
                <textarea style="width: 600px;" name="description" id="description" class="form-control">{!! old('description') !!}</textarea></label>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'description', options );
    </script>
@endpush
