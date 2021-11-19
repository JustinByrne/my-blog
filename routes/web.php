<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;

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


Route::middleware(['isSetup'])->group(function () {
    Route::prefix('/setup')->name('setup.')->group(function () {
        Route::get('/', [SetupController::class, 'welcome'])->name('welcome');
        Route::get('/requirements', [SetupController::class, 'requirements'])->name('requirements');
        Route::get('/database', [SetupController::class, 'database'])->name('database');
        Route::post('/database', [SetupController::class, 'storeDatabase']);
        Route::get('/settings', [SetupController::class, 'settings'])->name('settings');
        Route::post('/settings', [SetupController::class, 'storeSettings']);
    });
    
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
        Route::post('/media/filepond-upload', [UploadController::class, 'mediaPond'])->name('media.filepond-upload');
        Route::get('/media', [MediaController::class, 'index'])->name('media.index');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.delete');
    
        Route::prefix('settings')->name('settings.')->group(function() {
            Route::get('/', [SettingsController::class, 'general'])->name('general');
            Route::patch('/', [SettingsController::class, 'storeSettings'])->name('storeSettings');
            Route::get('/social', [SettingsController::class, 'social'])->name('social');
            Route::patch('/social', [SettingsController::class, 'storeSocial'])->name('storeSocial');
        });
    });
    
    Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
    Route::get('/tag/{tag}', [TagController::class, 'public'])->name('tags.public');
    Route::get('/category/{category}', [CategoryController::class, 'public'])->name('categories.public');
    Route::get('/{year}/{month}/{day}/{slug}', [ArticleController::class, 'show'])->name('articles.show');
});