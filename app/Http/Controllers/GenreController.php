<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreCreateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //

    public function viewGenrePage()
    {
        return view('Genre.genreCreate');
    }

    public function createGenre(GenreCreateRequest $request)
    {

        Genre::create([
            'name' => $request->name
        ]);

        return $this->getGenre();
    }

    public function getGenre()
    {
        $genres = Genre::all();
        return view('Genre.genreView', compact('genres'));
    }
    public function updateGenre()
    {
    }
    
    public function deleteGenre()
    {
    }
}
