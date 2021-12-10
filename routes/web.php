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

const genreController = 'App\Http\Controllers\GenreController';
const bookController = 'App\Http\Controllers\BookController';
const userController = 'App\Http\Controllers\UserController';

Route::get('/', function () {
    // return view('layouts.app');
    return redirect(route('getBooks'));
});

Route::post('/create-book', bookController . '@createBook')->name('createBook');
Route::get('/create-book', genreController . '@getGenreOnBookCreate')->name('getGenreOnBookCreate');
Route::get('/update-book/{id}', bookController . '@viewUpdateBook')->name('viewUpdateBook');
Route::get('/view-book/{id}', bookController . '@viewBook')->name('viewBook');
Route::patch('/update-book/{id}', bookController . '@updateBook')->name('updateBook');
Route::delete('/delete-book/{id}', bookController . '@deleteBook')->name('deleteBook');
Route::get('/get-books', bookController . '@getBooks')->name('getBooks');
Route::get('/get-books-by-filter', bookController . '@getBooksByFilter')->name('getBooksByFilter');

Route::post('/create-genre', genreController . '@createGenre')->name('createGenre');
Route::get('/create-genre', genreController . '@viewGenreCreate')->name('viewGenreCreate');
Route::get('/update-genre/{id}', genreController . '@viewUpdateGenre')->name('viewUpdateGenre');
Route::patch('/update-genre/{id}', genreController . '@updateGenre')->name('updateGenre');
Route::delete('/delete-genre/{id}', genreController . '@deleteGenre')->name('deleteGenre');
Route::get('/get-genres', genreController . '@getGenre')->name('getGenres');

Route::get('/update-users/{id}', userController . '@viewUpdateUser')->name('viewUpdateUser');
Route::get('/get-users', userController . '@getUsers')->name('getUsers');
Route::get('/get-user/{id}', userController . '@getUserByUserId')->name('getUserByUserId');
Route::patch('/update-user/{id}', userController . '@updateUser')->name('updateUser');
Route::delete('/delete-user/{id}', userController . '@deleteUser')->name('deleteUser');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'App\Http\Middleware\IsAdmin', 'prefix' => 'admin'], function () {
});

Route::group(['middleware' => 'App\Http\Middleware\IsMember', 'prefix' => 'member'], function () {
});