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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create-book', bookController . '@createBook')->name('createBook');
Route::get('/create-book', genreController . '@getGenreOnBookCreate')->name('getGenreOnBookCreate');
Route::get('/update-book/{id}', bookController . '@viewUpdateBook')->name('viewUpdateBook');
Route::patch('/update-book/{id}', bookController . '@updateBook')->name('updateBook');
Route::delete('/delete-book/{id}', bookController . '@deleteBook')->name('deleteBook');
Route::get('/get-book', bookController . '@getBook')->name('getBooks');

Route::post('/create-genre', genreController . '@createGenre')->name('createGenre');
Route::get('/create-genre', genreController . '@viewGenreCreate')->name('viewGenreCreate');
Route::get('/update-genre/{id}', genreController . '@viewUpdateGenre')->name('viewUpdateGenre');
Route::patch('/update-genre/{id}', genreController . '@updateGenre')->name('updateGenre');
Route::delete('/delete-genre/{id}', genreController . '@deleteGenre')->name('deleteGenre');
Route::get('/get-genre', genreController . '@getGenre')->name('getGenres');
Route::get('/get-genre', genreController . '@getGenreOnBookCreate')->name('getGenreOnBookCreate');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
