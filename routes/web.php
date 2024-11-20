<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/add', [MovieController::class, 'add'])->name('movies.add');
Route::post('/add', [MovieController::class, 'addAction'])->name('movies.addact');
Route::get('/{id}', [MovieController::class, 'detail'])->name('movies.detail');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');
Route::post('/edit/{id}', [MovieController::class, 'editAction'])->name('movies.editact');
Route::post('/del/{id}', [MovieController::class, 'delAction'])->name('movies.delact');
