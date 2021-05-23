<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function item()
    {
        $total_price = 0;
        $total_item = 0;
        $output = '';
        if (Session::has('shopping_cart') && !empty(Session::get('shopping_cart'))) {
            foreach (Session::get('shopping_cart') as $keys => $values) {
                $book = Books::with('author')->findOrFail($values["id"]);
                $book->img = Images::where([['book_id', '=', $book->id], ['main', '=', 1]])->first();
                $total_price_book = ((int)$values["product_quantity"] * $book->price);
                $total_price = $total_price + $total_price_book;
                $total_item = $total_item + 1;
                $output .= view('app.item',['book' => $book, 'total_price_book' => $total_price_book, 'count' => (int)$values["product_quantity"]]);
            }
        } else {
            return json_encode('empty');
        }
        Session::put('total_price', $total_price);
        $data = array(
            'cart_details' => $output,
            'total_price' => number_format($total_price, 2),
            'total_item' => $total_item
        );
        return json_encode($data);
    }

    public function add(Request $request)
    {
        if ($request->has('action') && $request->get('action') == 'add') {
            if (Session::has('shopping_cart')) {
                $available = 0;
                foreach (Session::get('shopping_cart') as $keys => $values) {
                    if (Session::get("shopping_cart")[$keys]['id'] == $request->get("id")) {
                        $available++;
                        $shop = Session::get("shopping_cart");
                        $shop[$keys]['product_quantity'] = $shop[$keys]['product_quantity'] + $request->get("product_quantity");
                        Session::put("shopping_cart", $shop);
                    }
                }
                if ($available == 0) {
                    $item_array = array(
                        'id' => $request->get("id"),
                        'product_quantity' => $request->get("product_quantity")
                    );
                    $shop = Session::get("shopping_cart");
                    $shop[] = $item_array;
                    Session::put("shopping_cart", $shop);
                }
            } else {
                $item_array = array(
                    'id' => $request->get("id"),
                    'product_quantity' => $request->get("product_quantity")
                );
                $shop[] = $item_array;
                Session::put("shopping_cart", $shop);
            }
        }
    }

    public function delete(Request $request)
    {
        if($request->has('action') && $request->get('action') == 'delete')
        {
            foreach(Session::get("shopping_cart") as $keys => $values)
            {
                if($values["id"] == $request->get('id'))
                {
                    $shop = Session::get("shopping_cart");
                    unset($shop[$keys]);
                    Session::put("shopping_cart", $shop);
                }
            }
        }
    }
}
