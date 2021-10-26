<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreCreateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //

    public function createGenre(GenreCreateRequest $request)
    {

        Genre::create([
            'name' => $request->name
        ]);

        return redirect(route('getGenre'));
    }

    public function getGenre()
    {
        $genres = Genre::all();
        return view('Genre.genreView', compact('genres'));
    }

    public function viewUpdateGenre($id){
        $genre = Genre::find($id);
        return view('Genre.genreUpdate', ['updateGenre' => $genre]);
    }

    public function updateGenre(GenreCreateRequest $request, $id){
        $genre = Genre::where('id', '=', $id)->first();

        $genre -> update([
            'name' => $request->name
        ]);

        return redirect(route('getGenre'));
    }

    public function deleteGenre($id){
        Genre::destroy($id);
        return redirect(route('getGenre'));
    }
}
