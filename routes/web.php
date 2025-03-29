<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/0.x'], function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/{section:slug}', [PageController::class, 'section'])->name('section');
    Route::get('/{section:slug}/{page:slug}', [PageController::class, 'page'])->name('page');
});

Route::get('/edit/0.x/{section:slug}/{page:slug}', [PageController::class, 'edit'])->name('edit');
Route::post('/edit/{page}', [PageController::class, 'store'])->name('store');
