<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\PostsController;
use App\Http\Controllers\News\CategoriesController;
use App\Http\Controllers\News\Admin\PostsController as AdminPostController;

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


// Админка
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

// Админка новостей
Route::prefix('/admin/posts')->group(function () {

    Route::get('/', [AdminPostController::class, 'index'])
        ->name('admin.posts.index');

    Route::get('/create', [AdminPostController::class, 'create'])
        ->name('admin.posts.create');

    Route::get('/{id}/edit', [AdminPostController::class, 'edit'])
        ->name('admin.posts.edit')
        ->where('id', '\d+');
});

// Категории новостей
Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])
        ->name('categories.index');
    Route::get('/{id}', [CategoriesController::class, 'show'])
        ->name('categories.show');
});
// Новости
Route::prefix('/news')->group(function () {
//    Route::get('/', [PostsController::class, 'index'])
//        ->name('news.index');
    Route::get('/{id}', [PostsController::class, 'show'])
        ->name('news.show');
});




