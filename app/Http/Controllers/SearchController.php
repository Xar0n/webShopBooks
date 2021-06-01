<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Books;
use App\Models\Images;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $where = [];
        $with = [];
        $whereRelated = [];
        $where[] = ['title', 'like', '%'.$request->get('query').'%'];
        if($request->has('filters') && $request->get('filters') == 1) {
            if($request->has('publisher') && !empty($request->get('publisher'))) {
                $whereRelated['publisher'] = ['title', 'like', '%'.$request->get('publisher').'%'];
                $with[] = 'publisher';
            }
            if($request->has('priceFrom') && $request->has('priceBy') && !empty($request->get('priceFrom'))
                && !empty($request->get('priceBy'))) {
                $where[] = ['price', '>=', $request->get('priceFrom')];
                $where[] = ['price', '<=', $request->get('priceBy')];
            }
            if ($request->has('availability') && $request->get('availability') == 1) {
                $where[] = ['available', '>', 0];
            }
        }
        $books = Books::with($with)->where($where)->paginate(40);
       if (array_key_exists('publisher', $whereRelated)) {
           $books= Books::with($with)->where($where)->whereHas('publisher', function ($q) use ($whereRelated) {
                $q->where([$whereRelated['publisher']]);
            })->paginate(40);
        }
        $count = 0;
        $last_id = 0;
        foreach ($books as $book) {
            $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
            $count++;
            if ($count == count($books)) {
                $last_id = $book->id;
            }
        }
        return view('app.search',['books' => $books, 'last_id' => $last_id]);
    }
}
