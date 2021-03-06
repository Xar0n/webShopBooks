<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPaymentRequest;
use App\Http\Requests\ShowPaymentRequest;
use App\Http\Requests\StatusPaymentRequest;
use App\Models\Books;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\Popularity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function show(ShowPaymentRequest $request)
    {
        if ($request->get('action') == 'show_payment' && Session::has('total_price')) {
            return Session::get('total_price');
        }
    }

    public function add(AddPaymentRequest $request)
    {
        if (Session::has('shopping_cart') && !empty(Session::get('shopping_cart')) && $request->get('action') == 'add_payment') {
            $number = substr(md5(time()), 0, 16);
            $payment = new Payments();
            $payment->FIO = $request->get('FIO');
            $payment->address = $request->get('address');
            $payment->phone = (int)$request->get('number');
            $payment->number = $number;
            $payment->sum = Session::get('total_price');
            $payment->delivery = $request->get('delivery');
            $payment->status_id = 1;
            $payment->save();

            foreach (Session::get('shopping_cart') as $keys => $values) {
                if ($book = Books::findOrFail($values["id"])) {
                    $order = new Orders();
                    $order->book_id = $book->id;
                    $order->payment_id = $payment->id;
                    $order->count = (int)$values["product_quantity"];
                    $order->save();

                    try {
                        $popular = Popularity::findOrFail($book->id);
                        $popular->count = $popular->count + 1;
                    } catch (ModelNotFoundException $e) {
                        $popular = new Popularity();
                        $popular->book_id = $book->id;
                        $popular->count = 1;
                    }
                    $popular->save();
                }
            }
            Session::flush();
            return $number;
        } else {
            return 'error';
        }
    }

    public function status(StatusPaymentRequest $request)
    {
        if ($request->get('action') == 'status_payment') {
            try {

                $number = $request->get('number_payment');
                $payment = Payments::where('number', '=', $number)->first();
                if (!empty($payment)) return $payment->status['name'];
                else return '?????????? ????????????????????????';
            } catch (\ErrorException $e) {
                return '?????????? ??????????????????????';
            }
        } else return '?????????? ??????????????????????';
    }
}
