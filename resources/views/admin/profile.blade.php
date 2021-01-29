@extends('admin.layouts.app')

@section('title-block')Редактирование профиля@endsection

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование профиля</h1>
    </div>
    <form action="{{ route('admin.profile') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Имя
                <input style="width: 600px;" name="name" class="form-control" value="{{ $user->name }}"></label>
        </div>
        <div class="mb-3">
            <label for="email">Эл. почта
                <input style="width: 600px;" name="email" class="form-control" value="{{ $user->email }}"></label>
        </div>
        <div class="mb-3">
            <label for="password">Текущий пароль
                <input
                    style="width: 600px;"
                    type="password"
                    name="password"
                    placeholder="Текущий пароль"
                    class="form-control"></label>
        </div>
        <div class="mb-3">
            <label for="newPassword">Новый пароль
                <input
                    style="width: 600px;"
                    type="password"
                    name="newPassword"
                    placeholder="Новый пароль"
                    class="form-control"></label>
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection
