@extends('layouts.dashboardLayout')


@section('content')


<div class="dashboardContentContainer">

    <div class="dashboardHeader">

        <div class="dashboardHeaderDetails">

            <p>Somename</p>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit">Log Out</button>
            </form>

        </div>



    </div>


    <div class="orderViewContainer">


        <div class="orderView">

            <h2 class="text-center">#{{$order->id}}</h2>
            <p> User First Name:<strong> {{$order->userFirstName}}</strong> </p>
            <p> User Last Name:<strong> {{$order->userLastName}}</strong> </p>
            <p> User Email: <strong>{{$order->userEmail}} </strong> </p>
            <p> User Address:<strong> {{$order->userAddress}}</strong> </p>




            @foreach($orderProducts as $product)

            @php

            $i = 0;

            @endphp
            <div class="orderViewProductDetails">
                <p class="checkoutProductName"> {{$product->name}} <br>
                    <small> <strong> QTY : {{$orderQuantities[$i]}} </strong></small> <br>

                </p>

                <img class="orderViewProductImage" class="checkoutProductImage" src="{{url('storage/images/'.$product->mainImage)}}" alt="">

                <p value="20" class="checkoutProductValue">${{$product->price * $orderQuantities[$i]}}</p>
                @php

                $i = $i + 1;

                @endphp
            </div>


            <p> Total Price: ${{$order->price}}</strong> </p>

            @endforeach
            <p> User Phone: <strong>{{$order->userPhone}}</strong> </p>
            <p> User Company: <strong>{{$order->company}}</strong> </p>
            <p> User Apartment:<strong> {{$order->userApartMent}}</strong> </p>
            <p> User City:<strong> {{$order->city}}</strong> </p>
            <p> User Country:<strong> {{$order->country}}</strong> </p>
            <p> Postal Code:<strong> {{$order->postalCode}}</strong> </p>
            <p> Date: <strong>{{$order->created_at->format('j F Y')}}</strong> </p>




        </div>


    </div>


</div>


@stop