<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsMemberMiddleware;
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

Auth::routes();

Route::get('/get-books', bookController . '@getBooks')->name('getBooks');
Route::get('/get-books-by-filter', bookController . '@getBooksByFilter')->name('getBooksByFilter');
Route::get('/view-book/{id}', bookController . '@viewBook')->name('viewBook');

Route::group(['middleware' => IsAdminMiddleware::class, 'prefix' => 'admin'], function () {
    Route::get('/update-users/{id}', userController . '@viewUpdateUser')->name('viewUpdateUser');
    Route::get('/get-users', userController . '@getUsers')->name('getUsers');
    Route::get('/get-user/{id}', userController . '@getUserByUserId')->name('getUserByUserId');
    Route::patch('/update-user/{id}', userController . '@updateUser')->name('updateUser');
    Route::delete('/delete-user/{id}', userController . '@deleteUser')->name('deleteUser');

    Route::post('/create-genre', genreController . '@createGenre')->name('createGenre');
    Route::get('/create-genre', genreController . '@viewGenreCreate')->name('viewGenreCreate');
    Route::get('/update-genre/{id}', genreController . '@viewUpdateGenre')->name('viewUpdateGenre');
    Route::patch('/update-genre/{id}', genreController . '@updateGenre')->name('updateGenre');
    Route::delete('/delete-genre/{id}', genreController . '@deleteGenre')->name('deleteGenre');
    Route::get('/get-genres', genreController . '@getGenre')->name('getGenres');

    Route::post('/create-book', bookController . '@createBook')->name('createBook');
    Route::get('/create-book', genreController . '@getGenreOnBookCreate')->name('getGenreOnBookCreate');
    Route::get('/update-book/{id}', bookController . '@viewUpdateBook')->name('viewUpdateBook');
    Route::patch('/update-book/{id}', bookController . '@updateBook')->name('updateBook');
    Route::delete('/delete-book/{id}', bookController . '@deleteBook')->name('deleteBook');
});

Route::group(['middleware' => IsMemberMiddleware::class, 'prefix' => 'member'], function () {
});
