@extends('admin.layouts.app')

@section('title-block')Создание новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание новости</h1>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="title">Заголовок
            <input name="title" class="form-control" placeholder="Заголовок"></label>
        </div><br>
        <div class="form-group">
            <label for="title">Url
            <input name="title" class="form-control" placeholder="Url"></label>
        </div><br>
        <div class="form-group">
            <label for="title">Категория
            <input name="title" class="form-control" placeholder="Категория"></label>
        </div><br>
        <div class="form-group">
            <label for="title">Текст
            <input name="title" class="form-control" placeholder="Текст"></label>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection
