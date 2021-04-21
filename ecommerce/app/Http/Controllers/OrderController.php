<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function __construct()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }
    }

    public function orders()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $page = 'orders';
        $orders = Order::all();




        return view('orders', compact('page', 'orders'));
    }



    public function orderView($id)
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }
        $order = Order::find($id);




        $orderProducts = array();

        $productsId = explode(',', $order->productIds);

        foreach ($productsId  as $id) {

            $product  = Product::find($id);

            array_push($orderProducts, $product);
        }




        $orderQuantities = array();

        $qtys = explode(',', $order->quantity);

        foreach ($qtys  as $qty) {


            array_push($orderQuantities, $qty);
        }



        $page = 'orders';



        return view('orderview', compact('order', 'page', 'orderProducts', 'orderQuantities'));
    }

    public function waitOrder($id)
    {

        $order = Order::find($id);

        $order->status = 'pending';

        $order->save();

        return redirect()->back();
    }

    public function completeOrder($id)
    {

        $order = Order::find($id);

        $order->status = 'Completed';

        $order->save();

        return redirect()->back();
    }
}
