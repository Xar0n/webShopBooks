<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function series()
    {
        $last_id = 0;
        $series = Series::with('author')->orderBy('id')->paginate(5);
        $count = 0;
        foreach ($series as $series) { //НИКОГДА ТАК НЕ ДЕЛАЙ!!!!!!!!!
            $count++;
            if ($count == count($series)) {
                $last_id = $series->id;
            }
        }
        return view('app.series',['series' => $series, 'last_id' => $last_id]);
    }
}
