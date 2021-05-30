<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Images;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function series()
    {
        $last_id = 0;
        $count = 0;
        $series = Series::with('author')->paginate(6);
        foreach ($series as $serie) { //НИКОГДА ТАК НЕ ДЕЛАЙ!!!!!!!!!
            $count++;
            if ($count == count($series)) {
                $last_id = $serie->id;
            }
        }
        return view('app.series',['series' => $series, 'last_id' => $last_id]);
    }

    public function series_one($id)
    {
        $last_id = 0;
        $series = Series::findOrFail($id);
        $books = Books::with('author')->where('series_id', $series->id)->paginate(40);
        $count = 0;
        foreach ($books as $book) { //НИКОГДА ТАК НЕ ДЕЛАЙ!!!!!!!!!
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count == count($books)) {
                $last_id = $book->id;
            }
        }
        return view('app.series_one',['series' => $series, 'books' => $books, 'last_id' => $last_id]);
    }
}
