@extends('layouts.app')

@section('title-block'){{ $news['title'] }}@endsection

@section('content')
    <h1>{{ $news['title'] }}</h1>
    <p>{{ $news['text'] }}</p>
@endsection
