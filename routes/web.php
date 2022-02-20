<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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
Route::get('/books/edit{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::post('/books/update{id}', [BookController::class, 'update'])->name('book.update');

Route::get('/account/user/books/{id}', [UserController::class, 'show'])->name('account.user.books');
Route::get('/account/user/book/{id}', [UserController::class, 'book'])->name('account.user.book');

Route::get('/account/user/edit/{id}', [UserController::class, 'edit'])->name('account.user.edit');
Route::post('/account/user/update/{id}', [UserController::class, 'update'])->name('account.user.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
//     return redirect()->route('index');
// });
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/search', [HomeController::class, 'name'])->name('search');
Route::post('/rent', [HomeController::class, 'rent'])->name('book.rent')->middleware('auth');



