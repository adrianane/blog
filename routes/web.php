<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('categorie/{categorySlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost'])->name('fe.categorie');
Route::get('articol/{categorySlug}/{postSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPostBySlug']);
Route::get('/cauta/', [App\Http\Controllers\Frontend\FrontendController::class, 'search'])->name('search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);
});

//todo: translate slugs
