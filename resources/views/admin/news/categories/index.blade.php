@extends('admin.layouts.app')

@section('title-block')Новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
    </div>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
