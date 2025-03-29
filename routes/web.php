<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionsController;
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

Route::get('/add/section', [SectionsController::class, 'create'])->name('sections.create');
Route::post('/add', [SectionsController::class, 'store'])->name('sections.store');
Route::post('/add/page', [SectionsController::class, 'page'])->name('pages.store');
