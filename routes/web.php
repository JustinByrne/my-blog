<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', HomeController::class)->name('home');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('pages', PageController::class)->except(['show']);
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
    Route::post('/media/upload', [UploadController::class, 'media'])->name('media.upload');
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
});

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/tag/{tag}', [TagController::class, 'public'])->name('tags.public');
Route::get('/category/{category}', [CategoryController::class, 'public'])->name('categories.public');
Route::get('/{year}/{month}/{day}/{slug}', [ArticleController::class, 'show'])->name('articles.show');