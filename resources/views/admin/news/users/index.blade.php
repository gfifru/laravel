@extends('admin.layouts.app')

@section('title-block')Пользователи@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="d-flex">
                    <a class="btn btn-success" href="{{ route('admin.users.edit', $user->id) }}">Ред.</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
