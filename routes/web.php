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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create-genre', genreController . '@createGenre')->name('createGenre');
Route::get('/create-genre', genreController . '@viewGenrePage')->name('viewGenrePage');
Route::get('/update-genre/{id}', genreController . '@viewUpdateGenre')->name('viewUpdateGenre');
Route::patch('/update-genre/{id}', genreController . '@updateGenre')->name('updateGenre');
Route::delete('/delete-genre/{id}', genreController . '@deleteGenre')->name('deleteGenre');
Route::get('/get-genre', genreController . '@getGenre')->name('getGenre');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
