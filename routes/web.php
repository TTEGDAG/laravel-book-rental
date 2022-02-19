<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;

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
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']); 

Auth::routes();
                          
Route::get('/books/all', [BookController::class, 'index'])->name('book.all');
Route::get('/books/show/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');

Route::get('/home', [SiteController::class, 'home'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/search', [HomeController::class, 'name'])->name('search');


