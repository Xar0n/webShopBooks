<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Images;
use App\Models\Publishers;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function publisher($id)
    {
        $last_id = 0;
        $publisher = Publishers::findOrFail($id);
        $books = Books::with('author')->where('publisher_id', $publisher->id)->paginate(40);
        $count = 0;
        foreach ($books as $book) {
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count == count($books)) {
                $last_id = $book->id;
            }
        }
        return view('app.publisher',['publisher' => $publisher, 'books' => $books, 'last_id' => $last_id]);
    }
}
