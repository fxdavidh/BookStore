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

    public function getBooks()
    {
        // get all data from every books, and set pagination to 5 books/page
        $books = DB::table('books')
            ->select('*')
            ->paginate(5);

        foreach ($books as $key => $value) {
            $bookId = $books[$key]->id;

            //  get every genres of the related book
            $genre = DB::table('book__genres')
                ->join('genres', 'book__genres.genreId', '=', 'genres.id')
                ->select('book__genres.bookId as bookId', 'genres.*')
                ->where('book__genres.bookId', '=', $bookId)
                ->get();
            $books[$key]->genre = $genre;

            //  check if image being taken from internet (from seeding) or from local query
            $image = mb_substr($books[$key]->cover, 0, 5);
            if ($image == 'https') {
                $books[$key]->imageFrom = 'web';
            } else {
                $books[$key]->imageFrom = 'local';
            }
        }
        return view('Book.bookView', compact('books'));
    }

    public function getBooksByFilter(Request $request)
    {
        // get all data from filtered title's books, and set pagination to 5 books/page
        $books = DB::table('books')
            ->select('*')
            ->where('books.name', 'like', '%' . $request->filter . '%')
            ->paginate(5);

        foreach ($books as $key => $value) {
            $bookId = $books[$key]->id;

            $genre = DB::table('book__genres')
                ->join('genres', 'book__genres.genreId', '=', 'genres.id')
                ->select('book__genres.bookId as bookId', 'genres.*')
                ->where('book__genres.bookId', '=', $bookId)
                ->get();
            $books[$key]->genre = $genre;

            $image = mb_substr($books[$key]->cover, 0, 5);
            if ($image == 'https') {
                $books[$key]->imageFrom = 'web';
            } else {
                $books[$key]->imageFrom = 'local';
            }
        }
        return view('Book.bookView', compact('books'));
    }

    public function viewUpdateBook($id)
    {
        $book = Book::find($id);

        $image = mb_substr($book->cover, 0, 5);
        if ($image == 'https') {
            $book->imageFrom = 'web';
        } else {
            $book->imageFrom = 'local';
        }

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
        foreach ($genres as $i => $genre) {
            if ($key < $arraySize) {
                if ($oldGenre[$key]->id == $genre->id) {
                    $genres[$i]->check = 'checked';
                    $key++;
                } else $genres[$i]->check = '';
            } else $genres[$i]->check = '';
        }

        return view('Book.bookUpdate', ['updateBook' => $book, 'updateGenre' => $genres]);
    }

    public function viewBook($id)
    {
        $book = Book::find($id);

        $image = mb_substr($book->cover, 0, 5);
        if ($image == 'https') {
            $book->imageFrom = 'web';
        } else {
            $book->imageFrom = 'local';
        }

        $genres = DB::table('book__genres')
            ->join('genres', 'book__genres.genreId', '=', 'genres.id')
            ->select('book__genres.bookId as bookId', 'genres.*')
            ->where('book__genres.bookId', '=', $id)
            ->get();

        return view('Book.bookViewDetail', ['book' => $book, 'genres' => $genres]);
    }

    public function updateBook(BookCreateUpdateRequest $request, $id)
    {
        $book = Book::where('id', '=', $id)->first();

        DB::table('book__genres')->where('bookId', '=', $id)->delete();
        Storage::delete($book->cover);

        $cover = $request->file('cover')->store('covers');

        $book->update([
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
