@extends('admin.layouts.app')

@section('title-block')Источники новостей@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Источники новостей</h1>
        <a class="btn btn-success" href="{{ route('admin.sources.create') }}">Добавить источник</a>
    </div>

    <h2>Список источников</h2>

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('admin.parser') }}">Загрузить новости из источников</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>URL</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->name }}</td>
                <td>{{ $source->url }}</td>
                <td>
                    <div class="d-flex">
                    <a class="btn btn-success" href="{{ route('admin.sources.edit', $source) }}">Ред.</a>
                    <form action="{{ route('admin.sources.destroy', $source) }}" method="post">
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

    <ul class="pagination">
        {{ $sources->links() }}
    </ul>


@endsection
