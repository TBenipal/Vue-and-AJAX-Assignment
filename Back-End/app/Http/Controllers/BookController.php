<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request) {

    $authorId = $request->get('author_id', null);
    $authorName = $request->get('author_name', '');
        // return Book::all();
        // return Book::all()->toArray();
        // return json_encode(Book::all()->toArray());
        // return Book::all()->toJson();

        // $books = Book::all();
        $booksQuery = Book::query();

        if($authorId !== null) {
            $booksQuery->where('author_id', '=', $authorId);
        }

        if(! empty($authorName)) {
            $booksQuery->whereHas('author', function($authorQuery) use ($authorName) {
                $authorQuery->where('name', 'LIKE', '%' .$authorName. '%');
            });
        }

        $booksQuery->with('author');
        $books = $booksQuery->get();
        return json_encode($books);
    }

    
    // Dependency Injection
    public function show(Book $book)
    {
        // dd($book);
        // $book = Book::find($id);
        $author = $book->author;
        return $book;
    }

    public function store(Request $request) {
        // dd($request->all());
        $title = $request->input('title');
        $authorId = $request->input('author_id', null);
        $publisherId = $request->input('publisher_id', null);

        // $book = new Book([]);

        //Creates a book and saves it at the sametime perferred way
        // $book = Book::create([
        //     'title' => $title,
        //     // 'author_id' => $authorId,
        //     // 'publisher_id' => $publisherId
        // ]);

        $book = Book::make([
            'title' => $title,
        ]);

        // $book = Book::create($request->all());

        $book->author()->associate($authorId);
        $book->save();
        return $book;
    }

    public function update(Request $request, Book $book) {
        // dd($request->all(), $book);

        if ($request->has('title')) {
            $book->title = $request->input('title');
        }

        $book->save();
        return $book;
    }

    public function destroy(Book $book) {
        $book->delete();

        return true;
    }
}
