<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/gallery/{file}', [GalleryController::class, 'show'])->name('gallery');

// Регистрация
Route::get('/signin', [AuthController::class, 'create'])->name('signin');
Route::post('/signin', [AuthController::class, 'registration'])->name('signin.post');

// Вход и выхлд
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD статей — защищено авторизацией
// Просмотр одной статьи — доступен всем
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// CRUD-операции — только для авторизованных
Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class)->except(['index', 'show']);
});