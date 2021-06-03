<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Images;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author($id)
    {
        $last_id = 0;
        $author = Authors::findOrFail($id);
        $books = Books::with('author')->where('author_id', $author->id)->paginate(40);
        $count = 0;
        foreach ($books as $book) {
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count == count($books)) {
                $last_id = $book->id;
            }
        }
        return view('app.author',['author' => $author, 'books' => $books, 'last_id' => $last_id]);
    }
}
