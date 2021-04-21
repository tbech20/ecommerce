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


    <div class="promocodes">



        <div class="addPromocode">

            <form action="{{url('/generatePromoCode')}}" method="POST">
                @csrf

                <p class="text-center">Add a promo code</p>

                <div class="form-group">

                    <label for="code">Code</label>

                    <input type="text" name='code' class="promocodeInput form-control">

                </div>

                <div class="form-group">

                    <label for="discount">Price Discount</label>

                    <input type="text" name='discount' class="promocodeInput form-control">

                </div>

                <button type="submit" class="btn btn-dark">Generate</button>
                @if(session('succesfull'))


                <p class="successFullMessage">{{session('succesfull')}}</p>

                @endif
            </form>
        </div>

        <table class="table">

            <tr>

                <th>Id</th>
                <th>Date</th>
                <th>Code</th>
                <th>Discount</th>
                <th>Stauts</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>

            </tr>

            @foreach($promocodes as $promocode)



            <tr>
                <td>{{$promocode->id}}</td>
                <td>{{$promocode->created_at->format('j F Y')}}</td>
                <td>{{$promocode->code}}</td>
                <td>{{$promocode->priceDiscount}}</td>
                <td>

                    @if($promocode->status == 'approved')
                    <p class="badge badge-success promocodeStatus">{{$promocode->status}}</p>
                    @else

                    <p class="badge badge-danger promocodeStatus">{{$promocode->status}}</p>
                    @endif


                </td>
                <td><a class="btn btn-success btn-sm" href="{{url('/promocode/approve/'. $promocode->id)}}">Approve</a></td>
                <td><a class="btn btn-danger btn-sm" href="{{url('/promocode/unapprove/'. $promocode->id)}}">Unapprove</a></td>
                <td><a class="btn btn-danger btn-sm" href="{{url('/promocode/delete/'. $promocode->id)}}">Delete</a></td>

            </tr>

            @endforeach




        </table>



    </div>




</div>


@stop


@section('scripts')



@stop