<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Promocode;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function show()
    {



        // Create a preference item


        if (session('cart')) {
            // dd(session('cart'));
            $products = collect([]);

            foreach (session('cart') as $product) {

                $currentProduct = collect([]);
                $currentProduct->push(Product::find($product['id']));
                $currentProduct->push($product['qty']);
                $products->push($currentProduct);
            }

            $total = 0;
            foreach ($products as $product) {

                $total  = $total + ($product[0]['price'] * $product[1]);
            }

            $totalProducts = 0;
            foreach ($products as $product) {

                $totalProducts  = $totalProducts + $product[1];
            }
        } else {

            return view('noproducts');
        }


        if (empty($products)) {

            $productsExists = false;
        } else {

            $productsExists = true;
        };

        return view('checkout', compact('products', 'total', 'totalProducts', 'productsExists'));
    }


    public function checkcoupon(Request $request)
    {

        $coupon = Promocode::where('code', $request->input('coupon'))->first();

        if (!$coupon) {

            return redirect()->back();
        }

        return redirect()->back()->with(['hasCoupon' => $coupon->code, 'discount' => $coupon->priceDiscount]);
    }


    public function proceed(Request $request)
    {


        $orderDetails = collect([]);
        $orderDetails->push($request->firstname);
        $orderDetails->push($request->lastname);
        $orderDetails->push($request->email);
        if ($request->company) {
            $orderDetails->push($request->company);
        } else {
            $orderDetails->push(null);
        }
        $orderDetails->push($request->address);
        $orderDetails->push($request->apartment);
        $orderDetails->push($request->city);
        $orderDetails->push($request->country);
        $orderDetails->push($request->postalcode);
        $orderDetails->push($request->phone);


        Session::put('orderDetails', $orderDetails);

        \MercadoPago\SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN_TEST'));

        $preference = new \MercadoPago\Preference();

        if (session('cart')) {
            // dd(session('cart'));
            $products = collect([]);

            foreach (session('cart') as $product) {

                $currentProduct = collect([]);
                $currentProduct->push(Product::find($product['id']));
                $currentProduct->push($product['qty']);
                $products->push($currentProduct);
            }

            $total = 0;
            foreach ($products as $product) {

                $total  = $total + ($product[0]['price'] * $product[1]);
            }

            $totalProducts = 0;
            foreach ($products as $product) {

                $totalProducts  = $totalProducts + $product[1];
            }


            if (session('hasCoupon')) {

                $value = $total - (session('discount') * $total / 100);
                $item = new \MercadoPago\Item();
                $item->title = 'Your Cart Has (' . $totalProducts . ') Products';
                $item->quantity = 1;
                $item->unit_price =  $value;
                $preference->back_urls = array(
                    "success" => "http://127.0.0.1:8000/paymentcompleted",
                    "failure" => "http://127.0.0.1:8000/paymentfail",
                    "pending" => "http://127.0.0.1:8000/paymentpending"
                );
                $preference->items = array($item);
                $preference->auto_return = "approved";
                $preference->save();
            } else {



                $item = new \MercadoPago\Item();
                $item->title = 'Your Cart Has (' . $totalProducts . ') Products';
                $item->quantity = 1;
                $item->unit_price =  $total;
                $preference->back_urls = array(
                    "success" => "http://127.0.0.1:8000/paymentcompleted",
                    "failure" => "http://127.0.0.1:8000/paymentfail",
                    "pending" => "http://127.0.0.1:8000/paymentpending"
                );
                $preference->items = array($item);
                $preference->auto_return = "approved";
                $preference->save();
            }
        }

        return view('payMcp', compact('preference', 'products', 'total', 'totalProducts',));
    }


    public function completedOrder(Request $request)
    {


        if (!$request->query('status')) {

            return 'no status';
        }

        if (!$request->query('status') == 'approved') {

            return 'no un';
        }
        if (!$request->query('payment_id')) {
            return 'no id';
        }

        $paymentDetails =  Http::withHeaders([
            'Authorization' => 'Bearer TEST-4148474348714958-012419-6f37fc7fe11ca94ae114c651290ab6c7-127497728',
        ])->get("https://api.mercadopago.com/v1/payments/" . $request->query('payment_id'))->json();


        if ($paymentDetails) {
            $order = new Order();
        };

        if (!session('cart')) {
            return 'no cart';
        }

        if (!session('orderDetails')) {
            return 'no ord';
        }


        $request->validate([

            'phone' => 'min:14',

        ]);

        $order->userFirstName = session('orderDetails')[0];
        $order->userLastName = session('orderDetails')[1];
        $order->userEmail = session('orderDetails')[2];
        $order->company = session('orderDetails')[3];
        $order->userAddress = session('orderDetails')[4];
        $order->userApartMent = session('orderDetails')[5];
        $order->city = session('orderDetails')[6];
        $order->country = session('orderDetails')[7];
        $order->postalCode = session('orderDetails')[8];
        $order->userPhone = session('orderDetails')[9];

        $ids = array();

        foreach (session('cart') as $product) {



            array_push($ids, $product['id']);
        }


        $stringIds = implode(',', $ids);

        $order->productIds = $stringIds;


        $qty = array();

        foreach (session('cart') as $product) {

            array_push($qty, $product['qty']);
        }


        $stringQty = implode(',', $qty);
        $order->quantity = $stringQty;

        $order->price = $paymentDetails['transaction_amount'];


        if ($order->save()) {

            Session::forget('cart');
            Session::forget('orderDetails');
            return redirect('/checkout');
        } else {

            return 'no save';
        };



        return "hey";
    }
}
