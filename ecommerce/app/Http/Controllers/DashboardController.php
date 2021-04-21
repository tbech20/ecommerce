<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Promocode;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function authenticate()
    {
    }


    public function calEarn()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }


        $results = Order::all();

        $value = 0;

        foreach ($results as $result) {


            $value =  $value + $result->price;
        }

        if ($value !== 0) {

            return   $value;
        }
    }

    public function dashboard()
    {
        if (!session('userId')) {

            return redirect('/admin/login');
        }


        $page = 'dashboard';

        $ordersCount  = count(Order::all());

        $productsCount = count(Product::all());


        $subscriberCount = count(Subscriber::all());

        $totalEarned = $this->calEarn();

        $todaysRecord = Order::where('created_at', '>=', Carbon::today())->get();

        $todaysRecordCount = count($todaysRecord);

        $recordsArray = [];

        for ($i = 1; $i <= 20; $i++) {




            $records =  Order::where('created_at', '<', Carbon::today()->subDays(($i - 1)))->where('created_at', '>=', Carbon::today()->subDays($i))->get();
            $recordCount = count($records);
            $recordsArray[$i] = $recordCount;
        }


        return view('dashboard', compact('page', 'recordsArray', 'todaysRecordCount', 'ordersCount', 'totalEarned', 'productsCount', 'subscriberCount'));
    }

    public function addproduct()
    {
        if (!session('userId')) {

            return redirect('/admin/login');
        }


        $page = 'addproduct';

        return view('addProduct', compact('page'));
    }


}
