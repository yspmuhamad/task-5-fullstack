<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // article
    Route::resource('article', ArticlesController::class);

    // category
    Route::get('/category', [CategoriesController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('/category/destroy/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');
});
