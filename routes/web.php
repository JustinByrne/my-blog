<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('pages', PageController::class)->except(['show']);
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
});

Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/{year}/{month}/{day}/{slug}', [ArticleController::class, 'show'])->name('articles.show');