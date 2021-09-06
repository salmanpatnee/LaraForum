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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/threads', [App\Http\Controllers\ThreadController::class, 'index'])->name('threads');
Route::get('/threads/create', [App\Http\Controllers\ThreadController::class, 'create'])->name('threads.create');
Route::get('/threads/{category:slug}', [App\Http\Controllers\ThreadController::class, 'index'])->name('threads.categories');

Route::get('/threads/{category}/{thread}', [App\Http\Controllers\ThreadController::class, 'show'])->name('threads.show');
Route::delete('/threads/{thread}', [App\Http\Controllers\ThreadController::class, 'destroy'])->name('threads.destroy');
Route::post('/threads}', [App\Http\Controllers\ThreadController::class, 'store'])->name('threads.store');

Route::post('/threads/{thread}/replies', [App\Http\Controllers\ReplyController::class, 'store'])->name('replies.store');
Route::patch('/replies/{reply}', [App\Http\Controllers\ReplyController::class, 'update'])->name('replies.update');
Route::delete('/replies/{reply}', [App\Http\Controllers\ReplyController::class, 'destroy'])->name('replies.destroy');

Route::post('/replies/{reply}/favorites', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');



Route::get('/profiles/{user:name}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');