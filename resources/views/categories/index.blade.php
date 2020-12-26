@extends('layouts.app')

@section('title-block')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <ul class="list">
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category['id']) }}">{{ $category['title'] }}</a></li>
        @endforeach
    </ul>
@endsection
