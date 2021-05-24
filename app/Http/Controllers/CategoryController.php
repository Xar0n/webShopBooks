<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Images;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id)
    {
        $last_id = 0;
       $category = Categories::findOrFail($id);
       $books = Books::with('author')->where('category_id', $category->id)->paginate(40);
        $count = 0;
        foreach ($books as $book) { //НИКОГДА ТАК НЕ ДЕЛАЙ!!!!!!!!!
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count == count($books)) {
                $last_id = $book->id;
            }
        }
       return view('app.category',['category' => $category, 'books' => $books, 'last_id' => $last_id]);
    }

}
