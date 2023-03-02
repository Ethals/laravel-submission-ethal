<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardTagController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'active' => 'welcome'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'active' => 'about'
    ]);
});

Route::get('posts', [PostController::class, 'index'])->name('posts');
Route::get('post/{id}', [PostController::class, 'show'])->name('show');
Route::get('articles', [ArticleController::class, 'index'])->name('articles');
Route::get('article/{id}', [ArticleController::class, 'show'])->name('show');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');
Route::resource('/dashboard/tags', DashboardTagController::class)->middleware('auth');;

Route::resource('dashboard/articles', DashboardArticleController::class)->middleware('auth');

