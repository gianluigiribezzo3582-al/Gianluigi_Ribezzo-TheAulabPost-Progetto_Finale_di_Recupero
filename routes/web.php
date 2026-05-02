
<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


Route::get('/indice', [ArticleController::class, 'index'])->name('article.index');
Route::get('/leggi/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/author/{user}/{name?}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');


Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

// Rotte per Writer
Route::middleware('userIsWriter')->prefix('writer')->group(function () {
    Route::get('/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
});

Route::middleware('userIsWriter')->group(function () {
    Route::get('/article/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article:slug}',      [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article:slug}',   [ArticleController::class, 'destroy'])->name('article.destroy');
});

// Rotte per Admin
Route::middleware('userIsAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/approve/admin/{user}',   [AdminController::class, 'approveAdmin'])->name('admin.approveAdmin');
    Route::post('/approve/revisor/{user}', [AdminController::class, 'approveRevisor'])->name('admin.approveRevisor');
    Route::post('/approve/writer/{user}',  [AdminController::class, 'approveWriter'])->name('admin.approveWriter');
});

// Rotte per Revisori
Route::middleware('userIsRevisor')->prefix('revisor')->group(function () {
    Route::get('/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/accept/{article}',      [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::post('/reject/{article}',      [RevisorController::class, 'reject'])->name('revisor.reject');
    Route::post('/reset/{article}',       [RevisorController::class, 'resetReview'])->name('revisor.resetReview');
});
