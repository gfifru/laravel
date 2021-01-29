@extends('layouts.base')

@section('title-block')Новости@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
                <span class="badge bg-primary rounded-pill">{{ $category->posts->count() }}</span>
            </li>
        @endforeach
    </ul>
@endsection
