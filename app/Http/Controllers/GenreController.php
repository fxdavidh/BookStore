<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreCreateRequest;
use App\Models\Genre;
use App\Models\Store;
use App\Models\Type;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function viewGenreCreate()
    {
        return view('Genre.genreCreate');
    }

    public function createGenre(GenreCreateRequest $request)
    {
        Genre::create([
            'name' => $request->name
        ]);

        return redirect(route('getGenres'));
    }

    public function getGenre()
    {
        $genres = Genre::all();
        return view('Genre.genreView', compact('genres'));
    }

    public function getGenreOnBookCreate()
    {
        $genres = Genre::all();
        $stores = Store::all();
        $types = Type::all();
        return view('Book.bookCreate', ['genres' => $genres, 'stores' => $stores, 'types' => $types,]);
    }

    public function viewUpdateGenre($id)
    {
        $genre = Genre::find($id);
        return view('Genre.genreUpdate', ['updateGenre' => $genre]);
    }

    public function updateGenre(GenreCreateRequest $request, $id)
    {
        $genre = Genre::where('id', '=', $id)->first();

        $genre->update([
            'name' => $request->name
        ]);

        return redirect(route('getGenres'));
    }

    public function deleteGenre($id)
    {
        Genre::destroy($id);
        return redirect(route('getGenres'));
    }
}
