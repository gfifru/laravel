<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

// Админка новостей
Route::prefix('/admin/categories')->name('admin.')->group(function () {
    Route::get('/', [AdminNewsController::class, 'index'])
        ->name('categories.index');
    Route::get('/create', [AdminNewsController::class, 'create'])
        ->name('categories.create');
    Route::get('/{id}/edit', [AdminNewsController::class, 'edit'])
        ->name('categories.edit')
        ->where('id', '\d+');
});

// Категории новостей
Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');
    Route::get('/{id}', [CategoryController::class, 'show'])
        ->name('categories.show');
});
// Новости
Route::prefix('/news')->group(function () {
//    Route::get('/', [NewsController::class, 'index'])
//        ->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])
        ->name('news.show');
});




