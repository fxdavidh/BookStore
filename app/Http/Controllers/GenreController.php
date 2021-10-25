<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreCreateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //

    public function createGenre(GenreCreateRequest $request){

        Genre::create([
            'name' => $request->name
        ]);

        return $this->show();
    }

    public function show(){
        $genres = Genre::all();
        return view('Genre.genreView', compact('genres'));
    }
}
