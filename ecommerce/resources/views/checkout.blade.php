@extends('layouts.appLayout')

@section('styles')

<link href="{{asset('/css/checkout.css')}}" rel="stylesheet">

@stop


@section('content')


<div class="checkoutContainer">



    <div class="checkout">







        <form action="{{'/proceed'}}" class="checkoutLeft" method="POST">
            @csrf

            <h2>Billing Address</h2>


            <div class="checkoutDoubleInput">

                <input type="text" name='firstname' required class="checkoutInput form-control" placeholder="First Name">
                <input type="text" name='lastname' required class="checkoutInput form-control" placeholder="Last Name">


            </div>

            <div class="checkoutLongInputContainer">
                <input type="email" name='email' required class="checkoutInput form-control" placeholder="Email">
                <input type="text" name='company' class="checkoutInput form-control" placeholder="Company (optional)">
                <input type="text" name='address' required class="checkoutInput form-control" placeholder="Adrress">

                <input type="text" name='apartment' required class="checkoutInput form-control" placeholder="Apartment">
                <input type="text" name='city' required class="checkoutInput form-control" placeholder="City">
            </div>
            <div class="checkoutDoubleInput">

                <select type="text" name='country' required class="checkoutInput form-control" placeholder="Country">


                    <option value="Argentina">Argentina</option>
                    <option value="Spain">Spain</option>


                </select>
                <input type="text" name='postalcode' required class="checkoutInput form-control" placeholder="Postal Code">

            </div>
            <input type="text" name='phone' required class="checkoutInput form-control" placeholder="Phone">


            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

            <button class="payBtn">Proceed To Checkout</button>




        </form>


        <div class="checkoutRight">

            <p class="checkoutRightHeading">Order Summary</p>

            @foreach($products as $product)


            <div class="checkoutProductDetails">

                <img class="checkoutProductImage" src="{{url('storage/images/'.$product[0]['mainImage'])}}" alt="">
                <p class="checkoutProductName">{{$product[0]['name']}} <br>
                    <small> <strong> QTY : {{$product[1]}} </strong></small> <br>

                <form action="{{url('/remove/' . $product[0]['id'])}}" method="POST">@csrf
                    <button type="submit" class="checkoutDecrease">&#x2715;</button>
                </form>


                </p>
                <p value="{{$product[0]['price'] * $product[1]}}" class="checkoutProductValue">${{$product[0]['price'] * $product[1]}}</p>

            </div>

            @endforeach

            <hr>

            <div class="checkoutRightInfo">

                <p>Subtotal</p>

                <p class="subTotal">${{$total}}</p>

            </div>

            <hr>

            <div class="checkoutRightInfo">

                <p>Discount <br>

                    @if(session('hasCoupon'))

                    <small>Coupon : {{session('hasCoupon')}}</small>
                </p>
                <p>{{session('discount')}}%</p>
                @endif

            </div>
            <hr>
            <div class="checkoutRightInfo">

                <p>Total</p>
                @if(session('hasCoupon'))

                <p>${{$total - (session('discount') * $total / 100)}}</p>

                @else

                <p>${{$total}}</p>
                @endif


            </div>

            <p class="demo"></p>

            <hr>

            <form class="applyCouponForm" action="{{url('/checkcoupon')}}" method="POST">
                <div class="checkoutCouponContainer">


                    @csrf
                    <input type="text" class="coupon form-control" name='coupon' placeholder="Coupon">
                    <button class="applyCouponBtn">Apply</button>

                </div>
            </form>







        </div>

    </div>

</div>


@stop