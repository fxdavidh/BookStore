<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateUpdateRequest;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    public function viewBookCreate()
    {
        return view('Book.bookCreate');
    }

    public function createBook(BookCreateUpdateRequest $request)
    {
        $cover = $request->file('cover')->store('covers');

        $book = Book::create([
            'name' => $request->name,
            'author' => $request->author,
            'synopsis' => $request->synopsis,
            'cover' => $cover,
            'price' => $request->price,
        ]);

        foreach ($request->genre as $key) {
            Book_Genre::create([
                'bookId' => $book->id,
                'genreId' => $key,
            ]);
        }

        return redirect(route('getBooks'));
    }

    public function getBook()
    {
        // $books = Book::all();
        // $book_genres = Book_Genre::all();
        // $books = DB::table('books')
        //         ->join('book__genres', 'books.id', '=', 'book__genres.bookId')
        //         ->join('genres', 'book__genres.genreId', '=', 'genres.id')
        //         ->select('books.id as bookId', 'books.name as bookName', 'books.author', 'books.synopsis', 'books.cover', 'books.price', 'genres.id as genreId', 'genres.name as genreName')
        //         ->get();

        $books = DB::table('books')
            ->select('*')
            ->get();

        foreach ($books as $key => $value) 
        {
            $bookId = $books[$key]->id;

            $genre = DB::table('book__genres')
                ->join('genres', 'book__genres.genreId', '=', 'genres.id')
                ->select('book__genres.bookId as bookId', 'genres.*')
                ->where('book__genres.bookId', '=', $bookId)
                ->get();
            $books[$key]->genre = $genre;
        }
        return view('Book.bookView', compact('books'));
    }

    public function viewUpdateBook($id)
    {
        $books = Book::find($id);
        $genres = DB::table('genres')
        ->select('genres.*')
        ->get();
        $oldGenre = DB::table('book__genres')
                ->join('genres', 'book__genres.genreId', '=', 'genres.id')
                ->select('book__genres.bookId as bookId', 'genres.*')
                ->where('book__genres.bookId', '=', $id)
                ->get();
        
        $key = 0;
        $arraySize = count($oldGenre);
        foreach($genres as $i => $genre) {
            if($key < $arraySize) {
                if($oldGenre[$key]->id == $genre->id ) {
                    $genres[$i]->check = 'checked';
                    $key++;
                }
                else $genres[$i]->check = '';
            }
            else $genres[$i]->check = '';
        }

        // return dd($genres);

        return view('Book.bookUpdate', ['updateBook' => $books, 'updateGenre' => $genres]);
    }

    public function updateBook(BookCreateUpdateRequest $request, $id)
    {
        $book = Book::where('id', '=', $id)->first();
        
        DB::table('book__genres')->where('bookId', '=', $id)->delete();
        Storage::delete($book->cover);

        $cover = $request->file('cover')->store('covers');

        $book -> update([
            'name' => $request->name,
            'author' => $request->author,
            'synopsis' => $request->synopsis,
            'cover' => $cover,
            'price' => $request->price,
        ]);

        foreach ($request->genre as $key) {
            Book_Genre::create([
                'bookId' => $book->id,
                'genreId' => $key,
            ]);
        }

        return redirect(route('getBooks'));
    }

    public function deleteBook($id)
    {
        $book = Book::where('id', '=', $id)->first();
        Storage::delete($book->cover);
        Book::destroy($id);
        return redirect(route('getBooks'));
    }
}
