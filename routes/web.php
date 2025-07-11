<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LocaleController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['setlocale'])->group(function (){
    Route::resource('books', BookController::class)->except(['show']);
    Route::resource('authors', AuthorController::class)->except(['show']);

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/locale/{locale}', [LocaleController::class, 'setLocale'])->name('set.locale');
});
