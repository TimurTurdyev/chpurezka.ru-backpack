<?php

use App\Http\Controllers\Catalog\ContactController;
use App\Http\Controllers\Catalog\HomeController;
use App\Http\Controllers\Catalog\ServiceController;
use App\Http\Controllers\Catalog\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('DontEndSlashMiddleware')->name('home.index');

Route::group(['prefix' => 'service'], function () {
    Route::get('/{service:id}', [ServiceController::class, 'index'])->middleware('DontEndSlashMiddleware')->name('service.index');
    Route::get('/info/{detail:id}', [ServiceController::class, 'show'])->middleware('DontEndSlashMiddleware')->name('service.show');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'all'])->middleware('DontEndSlashMiddleware')->name('blog.all');
    Route::get('/{blog:id}', [BlogController::class, 'index'])->middleware('DontEndSlashMiddleware')->name('blog.index');
    Route::get('/info/{post:id}', [BlogController::class, 'show'])->middleware('DontEndSlashMiddleware')->name('blog.show');
    Route::get('/tag/{tag:id}', [BlogController::class, 'tag'])->middleware('DontEndSlashMiddleware')->name('blog.tag');
});

Route::get('contact', [ContactController::class, 'index'])->middleware('DontEndSlashMiddleware')->name('contact.index');
Route::post('contact', [ContactController::class, 'send'])->middleware('DontEndSlashMiddleware')->name('contact.send');
