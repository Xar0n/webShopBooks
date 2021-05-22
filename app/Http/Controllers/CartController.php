<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function item()
    {
        $total_price = 0;
        $total_item = 0;
        $output = '';
        if (Session::has('shopping_cart')) {
            foreach (Session::get('shopping_cart') as $keys => $values) {
                $output .= '
                <tr>
                        <td class="w-25">
                            <img src="img/planet_of_people.png" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>' . $values["title"] . '</td>
                        <td>' . $values["price"] . '</td>
                        <td class="qty"><input type="number" class="form-control" id="input1" value="1" required min="1" max="100"></td>
                        <td>800 Р</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
            ';
                $total_price = $total_price + ((int)$values["product_quantity"] * (int)$values["price"]);
                $total_item = $total_item + 1;
            }
        } else {
            $output .= '
    <tr>
     <td colspan="5" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
        }
        $data = array(
            'cart_details' => $output,
            'total_price' => number_format($total_price, 2),
            'total_item' => $total_item
        );

        echo json_encode($data);
    }

    public function add(Request $request)
    {
        echo Session::get('action');
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
                        'title' => $request->get("title"),
                        'price' => $request->get("price"),
                        'product_quantity' => $request->get("product_quantity")
                    );
                    $shop = Session::get("shopping_cart");
                    $shop[] = $item_array;
                    Session::put("shopping_cart", $shop);
                }
            } else {
                $item_array = array(
                    'id' => $request->get("id"),
                    'title' => $request->get("title"),
                    'price' => $request->get("price"),
                    'product_quantity'         =>     $request->get("product_quantity")
                );
                $shop[] = $item_array;
                Session::put("shopping_cart", $shop);
            }
        }

    }
}
