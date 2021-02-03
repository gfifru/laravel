<?php

use App\Http\Controllers\News\Admin\IndexController;
use App\Http\Controllers\News\Admin\ProfileController;
use App\Http\Controllers\News\Admin\UserController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\Social\VkontakteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\PostsController;
use App\Http\Controllers\News\CategoriesController;
use App\Http\Controllers\News\Admin\PostController as AdminPostController;
use App\Http\Controllers\News\Admin\CategoryController as AdminCategoryController;

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

// Страницы
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
Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth',
        'as' => 'admin.'
    ], function () {

        Route::get('/', [IndexController::class, 'index'])->name('index');

        Route::match(['post', 'get'], 'profile', [ProfileController::class, 'updateProfile'])
            ->name('profile');

        Route::get('/logout', function () {
            \Auth::logout();
            return redirect()->route('welcome');
        })->name('logout');

        Route::group(['middleware' => 'admin'], function () {

            Route::resource('post', AdminPostController::class);
            Route::resource('categories', AdminCategoryController::class);
            Route::resource('users', UserController::class);

        });
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
//    Route::get('/', [PostsController2::class, 'index'])
//        ->name('news.index');
    Route::get('/{id}', [PostsController::class, 'show'])
        ->name('news.show');
});


Auth::routes();

// Parser
Route::get('/parser', [ParserController::class, 'index'])
    ->name('parser');

// VK
Route::get('/auth/vk/redirect', [VkontakteController::class, 'redirect'])
    ->name('vk.redirect');
Route::get('/auth/vk/callback', [VkontakteController::class, 'callback'])
    ->name('vk.callback');
