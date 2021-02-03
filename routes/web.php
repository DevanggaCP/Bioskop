<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['is_admin'])->group(function () {
	Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminHome']);
	
	Route::get('admin/movie', [App\Http\Controllers\MovieController::class, 'index'])->name('movie.index');
	Route::get('admin/movie/add', [App\Http\Controllers\MovieController::class, 'create'])->name('movie.add');
	Route::get('admin/movie/{id}', [App\Http\Controllers\MovieController::class, 'edit']);
	Route::post('admin/movie', [App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');
	Route::put('admin/movie/{id}', [App\Http\Controllers\MovieController::class, 'update']);
	Route::delete('admin/movie/{id}', [App\Http\Controllers\MovieController::class, 'destroy']);

	Route::get('admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
	Route::get('admin/category/add', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.add');
	Route::get('admin/category/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
	Route::post('admin/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
	Route::put('admin/category/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
	Route::delete('admin/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);


});