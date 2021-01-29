@extends('admin.layouts.app')

@section('title-block')Админка@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
    </div>
    <p>Добро пожаловать, {{ \Illuminate\Support\Facades\Auth::user()->name }}.</p>
    <p><a href="{{ route('admin.profile') }}">Изменить профиль</a></p>
@endsection
