<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// HALAMAN HOME
Route::get('/', [HomeController::class, 'index']);
// ------------------------------------------------------------

// HALAMAN ABOUT
Route::get('/about', [AboutController::class, 'index']);
// ------------------------------------------------------------

// HALAMAN POSTS
Route::get('/posts', [PostController::class, 'index']);

// SINGLE POST DARI HALAMAN POSTS
Route::get('/posts/{post:slug}', [PostController::class, 'Post']);
// ------------------------------------------------------------

// HALAMAN KATEGORI POST
Route::get('/categories', [CategoriesController::class, 'index']);
// ------------------------------------------------------------

// HALAMAN DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostsController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('guest');
// ------------------------------------------------------------

// HALAMAN LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
// ------------------------------------------------------------

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);
// ------------------------------------------------------------

// HALAMAN REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// ------------------------------------------------------------

// ADMINISTRATOR POST CATEGORIES
Route::resource('/dashboard/categories', AdminCategoriesController::class)->except('show')->middleware('admin');
// -------------------------------------------------------------
