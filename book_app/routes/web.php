<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::middleware(['auth'])->group(function () {

Route::get('/book', [BookController::class, 'index'])->name('index');
Route::get('/book/create', [BookController::class, 'create'])->name('create');
Route::post('/book/store', [BookController::class, 'store'])->name('store');
Route::get('/book/{book}', [BookController::class, 'show'])->name('show');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('edit');
Route::put('/book/{book}', [BookController::class, 'update'])->name('update');
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('destroy');
});
