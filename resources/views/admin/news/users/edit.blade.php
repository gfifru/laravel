@extends('admin.layouts.app')

@section('title-block')Редактирование пользователя@endsection

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование пользователя</h1>
    </div>
    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @method('PUT')
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
            <label for="is_admin">Администратор
                <select style="width: 600px;" class="form-control" name="is_admin">
                    <option value="1" @if($user->is_admin) selected @endif>Да</option>
                    <option value="0" @if(!$user->is_admin) selected @endif>Нет</option>
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection
