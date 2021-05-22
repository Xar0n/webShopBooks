<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Images;
use App\Models\Popularity;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::with('author')->get()->sortByDesc('id');
        $count = 0;
        foreach ($books as $book) { //НИКОГДА ТАК НЕ ДЕЛАЙ!!!!!!!!!
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count = count($books)) {
                $last_id = $book->id;
            }
        }
        $books_popular = Popularity::with('book', 'book.author')->limit(5)->get()->sortByDesc('count');
        foreach ($books_popular as $book) {
            $book->book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
        }
        return view('app.index',['books' => $books, 'last_id' => $last_id, 'books_popular' => $books_popular]);
    }

    public function book($id)
    {
        $book = Books::with('author', 'images', 'category', 'series', 'publisher', 'images')->findOrFail($id);
        $main_img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
        return view('app.book',['book' => $book, 'main_img' => $main_img]);
    }
}
