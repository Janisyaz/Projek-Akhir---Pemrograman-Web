<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Auth Routes (from Breeze)

// Public Routes
Route::get('/articles', [PublicController::class, 'indexArticles'])->name('articles.index');


// Admin Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    // Articles
    Route::resource('articles', ArticleController::class);
    Route::get('/admin/articles/{article}', [ArticleController::class, 'show'])->name('admin.articles.show');


    // Categories
    Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);

    // Comments
    Route::post('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [PublicController::class, 'home'])->name('home');
// Route::get('/articles/create', [PublicController::class, 'create'])->name('articles.create');
Route::get('/categories/{category:slug}', [PublicController::class, 'showCategory'])->name('categories.show');
Route::get('/articles/{article:slug}', [PublicController::class, 'showArticle'])->name('articles.show');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
require __DIR__ . '/auth.php';
