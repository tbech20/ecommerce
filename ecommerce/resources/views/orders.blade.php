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


    <div class="orders">


        <table class="table">

            <tr>

                <th>Date</th>
                <th>Email</th>
                <th>Price</th>
                <th>Order Id</th>
                <th>Status</th>
                <th>Wait order</th>
                <th>Complete order</th>
                <th>View</th>

            </tr>

            @foreach($orders as $order)



            <tr>


                <td>{{$order->created_at->format('j F Y')}}</td>
                <td>{{$order->userEmail}}</td>
                <td>${{$order->price}}</td>
                <td>{{$order->id}}</td>
                @if($order->status == 'pending')
                <td>
                    <p class="badge badge-info orderStatus">{{$order->status}}</p>
                </td>
                @else

                <td>
                    <p class="badge badge-success orderStatus">{{$order->status}}</p>
                </td>
                @endif
                <td><a class="btn btn-info btn-sm" href="{{url('/order/wait/'.$order->id)}}">Wait Order</a></td>
                <td><a class="btn btn-success btn-sm" href="{{url('/order/complete/'.$order->id)}}">Complete Order</a></td>
                <td><a class="btn btn-info btn-sm" href="{{url('/order/view/'. $order->id)}}">View</a></td>

            </tr>

            @endforeach




        </table>



    </div>




</div>


@stop


@section('scripts')



@stop