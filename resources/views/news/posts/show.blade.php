@extends('layouts.base')

@section('title-block'){{ $post->title }}@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $post->title }}</h1>
    </div>
    <p>{{ $post->description }}</p>
    <br>
@endsection
