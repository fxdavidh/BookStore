<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreCreateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function viewGenreCreate(){
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
        return view('Book.bookCreate', compact('genres'));
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
