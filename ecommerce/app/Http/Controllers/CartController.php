<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add($id, Request $request)
    {


        if (session('cart')) {

            $sessionArrays = Session::get('cart');


            $hasProduct = true;
            foreach ($sessionArrays as $product) {

                if ($product['id'] == $id) {

                    if ($request->qty) {
                        $product['qty'] = $product['qty'] + $request->qty;
                        $hasProduct = true;
                    } else {
                        $product['qty'] = $product['qty'] + 1;
                        $hasProduct = true;
                    }
                } else {

                    $hasProduct = false;
                }
            }
            if ($hasProduct  == false) {
                $products = collect(['id' => $id, 'qty' => $request->qty]);
                Session::push('cart', $products);
                return redirect()->back();
            }


            Session::put('cart', $sessionArrays);
            return redirect()->back();
        }

        $products = collect(['id' => $id, 'qty' => $request->qty]);
        Session::push('cart', $products);
        return redirect()->back();
    }

    public function remove($id)
    {

        if (session('cart')) {

            $num = 0;
            foreach (session('cart') as $product) {



                if ($product['id'] == $id) {

                    if ($product['qty'] == 1) {

                        Session::forget('cart.' . $num);
                    } else {
                        $product['qty'] = $product['qty'] - 1;
                    }
                };

                $num = $num + 1;
            }

            Session::put('cart', session('cart'));
            return redirect()->back();
        }
    }
}
