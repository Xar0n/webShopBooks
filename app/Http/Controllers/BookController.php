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
        $books_popular = Popularity::with('book')->limit(5)->get()->sortByDesc('count');
        return view('app.index',['books' => $books, 'last_id' => $last_id, 'books_popular' => $books_popular]);
    }
}
