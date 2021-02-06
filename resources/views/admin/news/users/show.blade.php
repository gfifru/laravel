@extends('admin.layouts.app')

@section('title-block'){{ $news['title'] }}@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $news['title'] }}</h1>
    </div>
    <p>{{ $news['text'] }}</p>
@endsection
