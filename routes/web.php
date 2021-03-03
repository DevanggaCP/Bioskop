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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie', [App\Http\Controllers\HomeController::class, 'movie'])->name('movie.public');
Route::get('/nonton', [App\Http\Controllers\HomeController::class, 'nonton'])->name('nonton.public');
Route::get('/movie/{id}', [App\Http\Controllers\HomeController::class, 'movieById']);
Route::get('/listOrder/{id}', [App\Http\Controllers\HomeController::class, 'listOrder']);
Route::get('/transaction/add/{id}', [App\Http\Controllers\TransactionController::class, 'createPublic']);
Route::get('/transaction/lunasi/{id}', [App\Http\Controllers\TransactionController::class, 'lunasiPublic']);
Route::post('/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store.public');
Route::post('/transaction/lunasi', [App\Http\Controllers\TransactionController::class, 'lunasi'])->name('transaction.lunasi.public');
Route::post('/selectTotalPrice', [App\Http\Controllers\TransactionController::class, 'selectTotalPrice'])->name('transaction.selectTotalPrice.public');

Route::get('/list-order', [App\Http\Controllers\AdminController::class, 'listOrder'])->name('home');

Route::middleware(['is_admin'])->group(function () {
	Route::prefix('admin')->group(function () {
		Route::get('/', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('dashboard');
		
		Route::get('/movie', [App\Http\Controllers\MovieController::class, 'index'])->name('movie.index');
		Route::get('/movie/add', [App\Http\Controllers\MovieController::class, 'create'])->name('movie.add');
		Route::post('/movie', [App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');
		Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'edit']);
		Route::put('/movie/{id}', [App\Http\Controllers\MovieController::class, 'update']);
		Route::delete('/movie/{id}', [App\Http\Controllers\MovieController::class, 'destroy']);

		Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
		Route::get('/category/add', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.add');
		Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
		Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
		Route::put('/category/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
		Route::delete('/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);

		Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');
		Route::get('/room/add', [App\Http\Controllers\RoomController::class, 'create'])->name('room.add');
		Route::post('/room', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
		Route::get('/room/{id}', [App\Http\Controllers\RoomController::class, 'edit']);
		Route::put('/room/{id}', [App\Http\Controllers\RoomController::class, 'update']);
		Route::delete('/room/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);

		Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');
		Route::get('/schedule/add', [App\Http\Controllers\ScheduleController::class, 'create'])->name('schedule.add');
		Route::post('/schedule', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule.store');
		Route::get('/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'edit']);
		Route::put('/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'update']);
		Route::delete('/schedule/{id}', [App\Http\Controllers\ScheduleController::class, 'destroy']);

		Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');
		Route::get('/transaction/add', [App\Http\Controllers\TransactionController::class, 'create'])->name('transaction.add');
		Route::post('/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');
		Route::post('/selectTotalPrice', [App\Http\Controllers\TransactionController::class, 'selectTotalPrice'])->name('transaction.selectTotalPrice');
		Route::get('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'edit']);
		Route::put('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'update']);
		Route::delete('/transaction/{id}', [App\Http\Controllers\TransactionController::class, 'destroy']);

	});
	


});