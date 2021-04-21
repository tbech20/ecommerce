@extends('layouts.appLayout')

@section('styles')

<link href="{{asset('/css/checkout.css')}}" rel="stylesheet">

@stop


@section('content')


<div class="checkoutContainer">



    <div class="checkout">







        <div class="checkoutLeft">
            @csrf

            <a class="payBtn" href="<?php echo $preference->init_point; ?>">Pay with Mercado Pago</a>
        </div>


        <div class="checkoutRight">

            <p class="checkoutRightHeading">Order Summary</p>

            @foreach($products as $product)


            <div class="checkoutProductDetails">

                <img class="checkoutProductImage" src="{{url('storage/images/'.$product[0]['mainImage'])}}" alt="">
                <p class="checkoutProductName">{{$product[0]['name']}} <br>
                    <small> <strong> QTY : {{$product[1]}} </strong></small> <br>



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


@section('scripts')


<script src="https://sdk.mercadopago.com/js/v2"></script>

@stop